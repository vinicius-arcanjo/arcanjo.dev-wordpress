@php
$args = [
    'post_type' => 'projeto',
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
                    <h4><?= get_the_title() ?></h4>
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
        <div class="col-lg-12">

            {{-- section title --}}
            <div class="ark-section-title">
                {{-- title frame --}}
                <div class="ark-title-frame">
                    {{-- title --}}
                    <h4>Detalhes do Projeto</h4>
                </div>
                {{-- title frame end --}}
            </div>
            {{-- section title end --}}

        </div>
        {{-- col end --}}

        {{-- col --}}
        <div class="col-lg-8">

            <div class="ark-a ark-card ark-fluid-card">
                <h3 class="mb-15">Descrição</h3>
                <div class="mb-15">{{ the_content() }}</div>
                {{-- button --}}

                <div class="ark-buttons-frame"><a href="{{ get_field('link') }}"
                        class="ark-link ark-color-link ark-w-chevron" target="_blank">Mais Detalhes</a></div>
            </div>

        </div>
        {{-- col end --}}

        {{-- col --}}
        <div class="col-lg-4">

            <div class="ark-a ark-card">
                {{-- table --}}
                <div class="ark-table p-15-15">
                    <ul>
                        <li>
                            <h6>Data:</h6><span>{{ get_field('date') }}</span>
                        </li>
                        <li>
                            <h6>Status:</h6><span>Finalizado</span>
                        </li>
                        <li>
                            <h6>Habilidades:</h6><span>{{ get_field('skills') }}</span>
                        </li>
                        <li>
                            <h6>Cliente:</h6><span>{{ get_field('client') }}</span>
                        </li>
                        <li>
                            <h6>Link do Projeto:</h6><span><a class="fw-bold" href="{{ get_field('link') }}"
                                    target="_blank">Abrir o Projeto</a></span>
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

@if (!empty(get_post_meta(get_the_ID(), 'galeria', TRUE)))
{{-- container --}}
<div class="container-fluid">

    {{-- row --}}
    <div class="row">

        {{-- col --}}
        <div class="col-lg-12">

            {{-- section title --}}
            <div class="ark-section-title">
                {{-- title frame --}}
                <div class="ark-title-frame">
                    {{-- title --}}
                    <h4>Resultado</h4>
                </div>
                {{-- title frame end --}}
            </div>
            {{-- section title end --}}

        </div>
        {{-- col end --}}

        <div class="ark-grid ark-grid-2-col ark-gallery p-0">

            @php
                $images = get_field('galeria');
                $class = ['ark-horizontal', 'ark-vertical', 'ark-square'];
            @endphp

            @foreach ($images as $image)
                {{-- grid item --}}
                <div class="ark-grid-item webTemplates">
                    {{-- grid item frame --}}
                    <a data-fancybox="gallery" data-src="{!! $image['url'] !!}"
                        class="ark-a ark-portfolio-item-frame {{ $class[array_rand($class)] }}">
                        {{-- img --}}
                        <img src="{!! $image['url'] !!}" alt="{{ $image['alt'] }}">
                        {{-- zoom icon --}}
                        <span class="ark-item-hover"><i class="fas fa-expand"></i></span>
                    </a>
                    {{-- grid item frame end --}}
                </div>
                {{-- grid item end --}}
            @endforeach

        </div>

    </div>
    {{-- row end --}}

</div>
{{-- container end --}}
@endif

{{-- Component Reviews --}}
@include('components.reviews')
{{-- Component Reviews  End --}}

{{-- Component Counter --}}
@include('components.counter')
{{-- Component Counter End --}}

{{-- container --}}
<div class="container-fluid">

    {{-- row --}}
    <div class="row">

        {{-- col --}}
        <div class="col-lg-12">

            {{-- call to action --}}
            <div class="ark-a ark-banner ark-bg">
                {{-- overlay --}}
                <div class="ark-banner-overlay">
                    {{-- main title --}}
                    <div class="ark-banner-title text-center">
                        {{-- title --}}
                        <h1 class="mb-15">Pronto para começar seu projeto?</h1>
                        {{-- suptitle --}}
                        <div class="ark-lg-text ark-code text-uppercase mb-25">Vamos Trabalhar Juntos!</div>
                        {{-- button --}}
                        <a href="/contato" class="ark-btn ark-btn-md"><span>Contate-me</span></a>
                    </div>
                    {{-- main title end --}}
                </div>
                {{-- overlay end --}}
            </div>
            {{-- call to action end --}}

            {{-- projects navigation --}}
            <div class="ark-a ark-pagination mt-5">
                {{-- button --}}
                <a class="ark-link ark-color-link ark-w-chevron ark-left-link"><span>Projeto Anterior</span></a>
                <div class="ark-pagination-center ark-m-hidden">
                    <a class="ark-link" href="/projetos">Todos os Projetos</a>
                </div>
                {{-- button --}}
                <a class="ark-link ark-color-link ark-w-chevron"><span>Próximo Projeto</span></a>
            </div>
            {{-- projects navigation end --}}

        </div>
        {{-- col end --}}

    </div>
    {{-- row end --}}

</div>
{{-- container end --}}
