<?php

function pagination( $args = array() ) {
	$defaults = array(
		'echo' => true,
		'query' => $GLOBALS['wp_query'],
		'show_all' => false,
		'prev_next' => true,
        'mid_size'  => 10,
		'prev_text' => __('Página Anteiror', 'sage'),
		'next_text' => __('Proxima Página', 'sage'),
	);

	$args = wp_parse_args( $args, $defaults );
	extract($args, EXTR_SKIP);

	// If there's only one page we sure don't need pagination
	if( $query->max_num_pages <= 1 ) {
		return;
	}

	$pagination = '';
	$links = array();

	$paged = max( 1, absint( $query->get( 'paged' ) ) );
	$max   = intval( $query->max_num_pages );

	if ( $show_all ) {
		$links = range(1, $max);
	} else {
		// Add some pages before the current page
		if ( $paged >= 3 ) {
			$links[] = $paged - 2;
			$links[] = $paged - 1;
		}
		// Add the current page
		if ( $paged >= 1 ) {
			$links[] = $paged;
		}
		// Add some pages after the current page
		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 1;
			$links[] = $paged + 2;
		}
	}

    // Use a wrapping <nav> element to identify it as a navigation section to screen readers and other assistive technologies.
	$pagination .= "\n" . '<div class="art-a art-pagination">' . "\n";

	// Previous Post Link
	if ( $prev_next && get_previous_posts_link() ) {
		$pagination .= sprintf( '<a class="art-link art-color-link art-w-chevron art-left-link" href="%s"><span>' . $prev_text . '</span></a><div class="art-pagination-center art-m-hidden">' . "\n", get_previous_posts_page_link() );
	} else {
        $pagination .= '<a class="art-link art-color-link art-w-chevron art-left-link"><span>Página Anterior</span></a><div class="art-pagination-center art-m-hidden">';
    }

	// Link to first page, plus ellipses if necessary
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' art-active-pag' : '';
		$pagination .= sprintf( '<a class="page-item%s" href="%s">%s</a>', $class, esc_url( get_pagenum_link( 1 ) ), '1' );
		$pagination .= "\n";
		if ( ! in_array( 2, $links ) ) {
			$pagination .= '<a class="page-item%s"><span class="page-link">' . __( '&hellip;' ) . '</span></li>';
		}
		$pagination .= "\n";
	}

	// Link to current page, plus $mid_size pages in either direction if necessary
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' art-active-pag' : '';
		$pagination .= sprintf( '<a class="page-item%s" href="%s">%s</a>', $class, esc_url( get_pagenum_link( $link ) ), $link );
		$pagination .= "\n";
	}

	// Link to last page, plus ellipses if necessary
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) ) {
			$pagination .= '<a class="page-item"><span class="page-link">' . __( '&hellip;' ) . '</span></a>';
			$pagination .= "\n";
		}
		$class = $paged == $max ? ' class="page-item%s art-active-pag"' : '';
		$pagination .= sprintf( '<a class="page-item%s" href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		$pagination .= "\n";
	}

	// Next Post Link
	if ($paged < $max) {
		$pagination .= sprintf( '</div><a class="art-link art-color-link art-w-chevron" href="%s"><span>' . $next_text . '</span></a>' . "\n", get_next_posts_page_link() );
	} else {
        $pagination .= '</div><a class="art-link art-color-link art-w-chevron"><span>Próxima Página</span></a></div>';
    }

	if ( $echo ) {
		echo $pagination;
	} else {
		return $pagination;
	}
}
?>
