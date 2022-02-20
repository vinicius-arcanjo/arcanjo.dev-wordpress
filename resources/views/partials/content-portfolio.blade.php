@php
$args = [
    'post_type' => 'projeto',
    'posts_per_page' => 30,
    'order' => 'DESC',
];
$q = new WP_Query($args);

@endphp

{{-- container --}}
<div class="container-fluid">

    {{-- row --}}
    <div class="row p-30-0">

        {{-- col --}}
        <div class="col-lg-12">

            {{-- filter --}}
            <div class="ark-filter mb-30">
                {{-- filter link --}}
                <a href="#" data-filter="*" class="ark-link ark-current">Todas as Categorias</a>

                @php
                    $categories = get_categories();
                    $i = 0;
                @endphp
                @foreach ($categories as $key => $category)
                    @if ($key > 0)
                        {{-- filter link --}}
                        <a href="#" data-filter=".{{ $category->slug }}" class="ark-link">{{ $category->name }}</a>
                        {{-- filter link --}}

                        @php
                            $i++;
                            if ($i == 7) {
                                break;
                            }
                        @endphp
                    @endif
                @endforeach

            </div>
            {{-- filter end --}}

        </div>
        {{-- col end --}}

        <div class="ark-grid ark-grid-2-col ark-gallery p-0">

            @if ($q->have_posts())
                @while ($q->have_posts())
                    {{ $q->the_post() }}

                    @php
                        $id = get_the_ID();
                        $image_id = get_post_thumbnail_id();
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);

                        $cats = get_the_category();
                        $cat = $cats[0];
                        $cat_slug = $cat->slug;

                        $class = ['ark-horizontal', 'ark-vertical', 'ark-square'];
                    @endphp

                    {{-- grid item --}}
                    <div class="ark-grid-item {{ $cat_slug }}">
                        {{-- grid item frame --}}
                        <a data-fancybox="gallery" data-src="{{ get_the_post_thumbnail_url() }}"
                            class="ark-a ark-portfolio-item-frame {{ $class[array_rand($class)] }}">
                            {{-- img --}}
                            <img src="{{ get_the_post_thumbnail_url() }}" alt="{{ $image_alt }}">
                            {{-- zoom icon --}}
                            <span class="ark-item-hover"><i class="fas fa-expand"></i></span>
                        </a>
                        {{-- grid item frame end --}}
                        {{-- description --}}
                        <div class="ark-item-description">
                            {{-- title --}}
                            <h5 class="mb-15"><?= get_the_title() ?></h5>
                            <div class="mb-15"><?= wp_trim_words(get_the_excerpt(), 13, '...') ?></div>
                            {{-- button --}}
                            <a href="{{ get_the_permalink() }}" class="ark-link ark-color-link ark-w-chevron">Veja
                                Mais</a>
                        </div>
                        {{-- description end --}}
                    </div>
                    {{-- grid item end --}}

                @endwhile
            @endif

        </div>

    </div>
    {{-- row end --}}

</div>
{{-- container end --}}
