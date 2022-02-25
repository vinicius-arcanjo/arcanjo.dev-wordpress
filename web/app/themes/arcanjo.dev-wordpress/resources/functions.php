<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7.1 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__.'/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__).'/config/assets.php',
            'theme' => require dirname(__DIR__).'/config/theme.php',
            'view' => require dirname(__DIR__).'/config/view.php',
            'pagination' => require dirname(__DIR__).'/resources/pagination.php',
        ]);
    }, true);


//  Custom
// Hook <strong>lc_custom_post_movie()</strong> to the init action hook
add_action( 'init', 'arkan_custom_post_project' );
add_action( 'init', 'arkan_custom_post_courses' );

// The custom function to register a movie post type
function arkan_custom_post_project() {

  // Set the labels, this variable is used in the $args array
  $labels = array(
    'name'               => __( 'Projetos' ),
    'singular_name'      => __( 'Projeto' ),
    'add_new'            => __( 'Add Novo Projeto' ),
    'add_new_item'       => __( 'Add Novo Projeto' ),
    'edit_item'          => __( 'Editar Projeto' ),
    'new_item'           => __( 'Novo Projeto' ),
    'all_items'          => __( 'Todos os Projetos' ),
    'view_item'          => __( 'Ver Projetos' ),
    'search_items'       => __( 'Procurar Projetos' ),
    'featured_image'     => 'Image',
    'set_featured_image' => 'Add Image'
  );

  // The arguments for our post type, to be entered as parameter 2 of register_post_type()
  $args = array(
    'labels'            => $labels,
    'description'       => 'Holds our projects specific data',
    'public'            => true,
    'menu_position'     => 5,
    'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'page-attributes' ),
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'query_var'         => 'projeto',
    'taxonomies'  => array( 'category', 'post_tag' )
  );

  // Call the actual WordPress function
  // Parameter 1 is a name for the post type
  // Parameter 2 is the $args array
  register_post_type( 'projeto', $args);
}

//Courses
function arkan_custom_post_courses() {

  // Set the labels, this variable is used in the $args array
  $labels = array(
    'name'               => __( 'Cursos' ),
    'singular_name'      => __( 'Curso' ),
    'add_new'            => __( 'Add Novo Curso' ),
    'add_new_item'       => __( 'Add Novo Curso' ),
    'edit_item'          => __( 'Editar Curso' ),
    'new_item'           => __( 'Novo Curso' ),
    'all_items'          => __( 'Todos os Cursos' ),
    'view_item'          => __( 'Ver Curso' ),
    'search_items'       => __( 'Procurar Curso' ),
    'featured_image'     => 'Image',
    'set_featured_image' => 'Add Image'
  );

  // The arguments for our post type, to be entered as parameter 2 of register_post_type()
  $args = array(
    'labels'            => $labels,
    'description'       => 'Holds our Course specific data',
    'public'            => true,
    'menu_position'     => 5,
    'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'page-attributes' ),
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'query_var'         => 'curso',
    'taxonomies'  => array( 'category', 'post_tag' )
  );

  // Call the actual WordPress function
  // Parameter 1 is a name for the post type
  // Parameter 2 is the $args array
  register_post_type( 'curso', $args);
}

// Webp

function webp_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');

function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);

//Callback Comments
function ark_comment($comment, $args, $depth) { ?>
    <li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">

        <?php if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="ark-comment-body">
        <?php } ?>

            <div class="ark-comment-image">
                <?php
                if ( $args['avatar_size'] != 0 ) {
                    echo get_avatar($comment);
                } ?>
            </div>

            <div class="ark-comment">
                <div class="ark-comment-name">
                    <?php printf( __( '%s' ), get_comment_author_link() ); ?>
                </div>

                <div class="ark-comment-text">
                    <div class="ark-comment-single-text">
                        <?php comment_text(); ?>
                    </div>
                </div>

                <?php if ( $comment->comment_approved == '0' ) { ?>
                    <em class="comment-awaiting-moderation">
                        <?php _e( 'Seu comentário está aguardando moderação.' ); ?>
                    </em>
                <?php } ?>

                <div class="ark-comment-info">
                    <span class="ark-comment-time">
                        <?php printf( __('%1$s'), get_comment_time() ); ?>
                    </span>

                    <span class="ark-comment-data">
                        <?php printf( __('%1$s'), get_comment_date()); ?>
                    </span>

                    <?php edit_comment_link( __( '(Editar)' ), '  ', '' ); ?>

                    <span class="ark-comment-reply">
                        <?php
                        comment_reply_link(
                            array_merge(
                                $args,
                                array(
                                    'reply_to_text' => __( 'Responder o(a) %s' ),
                                    'reply_text' => __('Responder'),
                                    'depth'     => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before' => '<div></div>'
                                )
                            )
                        ); ?>
                    </span>
                </div>
            </div>
<?php
}


