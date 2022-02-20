@php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$args = [
    'post_type' => 'post',
    'posts_per_page' => 10,
    'paged' => $paged,
    'orderby' => 'rand',
];
$q = new WP_Query($args);
@endphp

{{-- container --}}
<div class="container-fluid">
    {{-- row --}}
    <div class="row p-30-0">
        {{-- col --}}
        <div class="col-lg-12">
            {{-- section title --}}
            <div class="ark-section-title">
                {{-- title frame --}}
                <div class="ark-title-frame">
                    {{-- title --}}
                    <h1 class="ark-xl-text">{{ the_title() }}</h1>
                </div>
                {{-- title frame end --}}
                {{-- right frame --}}
                <div class="ark-right-frame">
                    <div class="ark-project-category">{{ the_tags($before = '') }}</div>
                </div>
                {{-- right frame end --}}
            </div>
            {{-- section title end --}}
        </div>
        {{-- col end --}}
        {{-- col --}}
        <div class="col-lg-12">
            {{-- project cover --}}
            <div class="ark-a ark-project-cover">
                {{-- item frame --}}
                <a data-fancybox="gallery" data-src="{{ get_the_post_thumbnail_url() }}"
                    class="ark-portfolio-item-frame ark-horizontal">
                    {{-- img --}}
                    <img src="{{ get_the_post_thumbnail_url() }}" alt="item">
                    {{-- zoom icon --}}
                    <span class="ark-item-hover"><i class="fas fa-expand"></i></span>
                </a>
                {{-- item end --}}
            </div>
            {{-- project cover nd --}}
        </div>
        {{-- col end --}}
        {{-- col --}}
        <div class="col-lg-8">

            {{-- post text --}}
            <article {{ post_class() }}>
                <div class="ark-a ark-card">
                    {{ the_content() }}
                </div>
            </article>
            {{-- post text end --}}

        </div>
        {{-- col end --}}

        {{-- col --}}
        <div class="col-lg-4">

            <div class="ark-a ark-card">
                {{-- table --}}
                <div class="ark-table p-15-15">
                    <ul>
                        <li>
                            <h6>Data:</h6><span>{{ get_the_date() }}</span>
                        </li>
                        <li>
                            <h6>Autor:</h6><span>Vinicius Arcanjo</span>
                        </li>
                        <li>
                            <h6>Categoria:</h6><span>{{ the_category() }}</span>
                        </li>
                    </ul>
                </div>
                {{-- table end --}}
            </div>

        </div>
        {{-- col end --}}

    </div>
    {{-- row end --}}

</div>
{{-- container end --}}

{{-- Comments --}}
<div class="container-fluid">
    {{ comments_template('/components/comments.php') }}
</div>
{{-- Comments end --}}

{{-- container --}}
<div class="container-fluid">

    {{-- row --}}
    <div class="row">

        {{-- col --}}
        <div class="col-lg-12">

            {{-- pagination --}}
            <div class="ark-a ark-pagination">
                {{-- button --}}
                @php
                    $prev_post = get_adjacent_post(false, '', true);
                    $next_post = get_adjacent_post(false, '', false);
                @endphp

                @if (!empty($prev_post))
                    <a href="{{ get_the_permalink($prev_post->ID) }}"
                        class="ark-link ark-color-link ark-w-chevron ark-left-link"><span>Post Anterior</span></a>
                @else
                    <a class="ark-link ark-color-link ark-w-chevron ark-left-link"><span>Post Anterior</span></a>
                @endif

                <div class="ark-pagination-center ark-m-hidden">
                    <a class="ark-link" href="/blog">Todas as Publicações</a>
                </div>
                {{-- button --}}
                @if (!empty($next_post))
                    <a href="{{ get_the_permalink($next_post->ID) }}"
                        class="ark-link ark-color-link ark-w-chevron"><span>Próximo Post</span></a>
                @else
                    <a class="ark-link ark-color-link ark-w-chevron"><span>Próximo Post</span></a>
                @endif

            </div>
            {{-- pagination end --}}

        </div>
        {{-- col end --}}

    </div>
    {{-- row end --}}

</div>
{{-- container end --}}

{{-- container --}}
<div class="container-fluid">

    {{-- row --}}
    <div class="row p-30-0">

        {{-- col --}}
        <div class="col-lg-12">

            {{-- section title --}}
            <div class="ark-section-title">
                {{-- title frame --}}
                <div class="ark-title-frame">
                    {{-- title --}}
                    <h4>Outros Posts</h4>
                </div>
                {{-- title frame end --}}
            </div>
            {{-- section title end --}}

        </div>
        {{-- col end --}}

        {{-- col --}}
        <div class="col-lg-12">

            {{-- slider container --}}
            <div class="swiper-container ark-blog-slider" style="overflow: visible">
                {{-- slider wrapper --}}
                <div class="swiper-wrapper">

                    @if ($q->have_posts())
                        @while ($q->have_posts())
                            {{ $q->the_post() }}

                            {{-- slide --}}
                            <div class="swiper-slide">

                                {{-- blog post card --}}
                                <div class="ark-a ark-blog-card">
                                    {{-- post cover --}}
                                    <a href="{{ get_the_permalink() }}" class="ark-port-cover">
                                        {{-- img --}}

                                        @php
                                            $image_id = get_post_thumbnail_id();
                                            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                                        @endphp

                                        <img src="{{ get_the_post_thumbnail_url() }}" alt="{{ $image_alt }}">
                                    </a>
                                    {{-- post cover end --}}
                                    {{-- post description --}}
                                    <div class="ark-post-description">
                                        {{-- title --}}
                                        <a href="{{ get_the_permalink() }}">
                                            <h5 class="mb-15"><?= get_the_title() ?></h5>
                                        </a>
                                        {{-- text --}}
                                        <div class="mb-15"><?= wp_trim_words(get_the_excerpt(), 10, '...') ?>
                                        </div>
                                        {{-- link --}}
                                        <a href="{{ get_the_permalink() }}"
                                            class="ark-link ark-color-link ark-w-chevron">Leia Mais</a>
                                    </div>
                                    {{-- post description end --}}
                                </div>
                                {{-- blog post card end --}}

                            </div>
                            {{-- slide end --}}

                        @endwhile
                    @endif
                </div>
                {{-- slider wrapper end --}}
            </div>
            {{-- slider container end --}}

        </div>
        {{-- col end --}}

        {{-- col --}}
        <div class="col-lg-12">

            {{-- slider navigation --}}
            <div class="ark-slider-navigation">

                {{-- left side --}}
                <div class="ark-sn-left">

                    {{-- slider pagination --}}
                    <div class="swiper-pagination"></div>

                </div>
                {{-- left side end --}}

                {{-- right side --}}
                <div class="ark-sn-right">

                    {{-- slider navigation --}}
                    <div class="ark-slider-nav-frame">
                        {{-- prev --}}
                        <div class="ark-slider-nav ark-blog-swiper-prev"><i class="fas fa-chevron-left"></i></div>
                        {{-- next --}}
                        <div class="ark-slider-nav ark-blog-swiper-next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                    {{-- slider navigation --}}

                </div>
                {{-- right side end --}}

            </div>
            {{-- slider navigation end --}}

        </div>
        {{-- col end --}}

    </div>
    {{-- row end --}}

</div>
{{-- container end --}}
