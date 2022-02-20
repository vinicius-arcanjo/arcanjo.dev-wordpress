@php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$args = [
    'post_type' => 'post',
    'posts_per_page' => 10,
    'paged' => $paged,
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
            {{-- section title --}}
            <div class="ark-section-title">
                {{-- title frame --}}
                <div class="ark-title-frame">
                    {{-- title --}}
                    <h4>Blog</h4>
                </div>
                {{-- title frame end --}}
            </div>
            {{-- section title end --}}
        </div>
        {{-- col end --}}

        @if ($q->have_posts())
            @while ($q->have_posts())
                {{ $q->the_post() }}

                {{-- col --}}
                <div class="col-lg-6">
                    {{-- blog post card --}}
                    <div class="ark-a ark-blog-card">
                        {{-- post cover --}}
                        <a href="{{ get_the_permalink() }}" class="ark-port-cover">
                            {{-- img --}}
                            @php
                                $id = get_the_ID();
                                $image_id = get_post_thumbnail_id();
                                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                            @endphp
                            <img src="{{ get_the_post_thumbnail_url() }}" alt="{{ $image_alt }}">
                        </a>
                        {{-- post cover end --}}
                        {{-- post description --}}
                        <div class="ark-post-description">
                            {{-- title --}}
                            <div class="ark-section-title">
                                <div class="ark-title-frame mb-0">
                                    <div class="ark-right-frame">
                                        <div class="ark-project-category">{{ the_category($separator = ', ') }} -
                                            {{ get_the_date() }}</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ get_the_permalink() }}">
                                <h5 class="mb-15">{{ get_the_title() }}</h5>
                            </a>
                            {{-- text --}}
                            <div class="mb-15">{{ wp_trim_words(get_the_excerpt(), 25, '...') }}</div>
                            {{-- link --}}
                            <a href="{{ get_the_permalink() }}" class="ark-link ark-color-link ark-w-chevron">Leia
                                Mais</a>
                        </div>
                        {{-- post description end --}}
                    </div>
                    {{-- blog post card end --}}
                </div>
                {{-- col end --}}

            @endwhile
        @endif

    </div>
    {{-- row end --}}
</div>
{{-- container end --}}

{{-- container --}}
<div class="container-fluid">
    {{-- row --}}
    <div class="row">
        {{-- col --}}
        <div class="col-lg-12">
            {{-- pagination --}}
            @php
                $args = ['query' => $q];
                pagination($args);
            @endphp
            {{-- pagination end --}}
        </div>
        {{-- col end --}}
    </div>
    {{-- row end --}}
</div>
{{-- container end --}}
