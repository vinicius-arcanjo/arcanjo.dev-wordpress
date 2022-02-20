{{-- container --}}
<div class="container-fluid">

    {{-- row --}}
    <div class="row p-60-0 p-lg-30-0 p-md-15-0">
        {{-- col --}}
        <div class="col-lg-12">

            {{-- banner --}}
            <div class="ark-a ark-banner" style="background-image: url('{!! get_field('background') !!}')">
                {{-- banner back --}}
                <div class="ark-banner-back"></div>
                {{-- banner dec --}}
                <div class="ark-banner-dec"></div>
                {{-- banner overlay --}}
                <div class="ark-banner-overlay ark-course-overlay">
                    {{-- main title --}}
                    <div class="ark-banner-title">
                        {{-- title --}}
                        <h1 class="mb-15"><i class="fab fa-wordpress"></i>{{ ' ' }}WordPress Avançado</h1>
                        {{-- suptitle --}}
                        <div class="ark-lg-text ark-code mb-25">&lt;<i>code</i>&gt; Aprenda a construir <span
                                class="txt-rotate" data-period="2000"
                                data-rotate='[ "sites profissionais", "loja virtuais", "plataformas de cursos", "sistemas customizados" ]'></span>&lt;/<i>code</i>&gt;
                        </div>
                        <p class="fs-14 text-white">{!! get_field('subtitle') !!}</p>
                        <div class="ark-buttons-frame">
                            {{-- button --}}
                            <a href="/projetos" class="ark-btn ark-btn-md"><span>Comprar</span></a>
                        </div>
                    </div>
                    {{-- main title end --}}
                </div>
                {{-- banner overlay end --}}
            </div>
            {{-- banner end --}}

        </div>
        {{-- col end --}}
    </div>
    {{-- row end --}}

</div>
{{-- container end --}}

{{-- container --}}
<div class="container-fluid">

    {{-- row --}}
    <div class="row p-60-0 p-lg-30-0 p-md-15-0">
        {{-- col --}}
        <div class="col-lg-12">

            {{-- banner --}}
            <div class="ark-a ark-banner ark-bg-course">
                {{-- banner back --}}
                <div class="ark-banner-back"></div>
                {{-- banner dec --}}
                <div class="ark-banner-dec"></div>
                {{-- banner overlay --}}
                <div class="ark-banner-overlay ark-course-overlay-white">
                    {{-- main title --}}
                    <div class="ark-banner-title">
                        {{-- title --}}
                        <h2 class="ark-title-tech mb-15">O que iremos construir</h2>
                        {{ the_content() }}
                    </div>
                    {{-- main title end --}}
                </div>
                {{-- banner overlay end --}}
            </div>
            {{-- banner end --}}

        </div>
        {{-- col end --}}
    </div>
    {{-- row end --}}

</div>
{{-- container end --}}

{{-- container --}}
<div class="container-fluid">

    {{-- row --}}
    <div class="row p-60-0 p-lg-30-0 p-md-15-0">
        {{-- col --}}
        <div class="col-lg-12">

            {{-- banner --}}
            <div class="ark-a ark-banner">
                {{-- banner back --}}
                <div class="ark-banner-back"></div>
                {{-- banner dec --}}
                <div class="ark-banner-dec"></div>
                {{-- banner overlay --}}
                <div class="ark-banner-overlay ark-course-overlay-white">
                    {{-- main title --}}
                    <div class="ark-banner-title">
                        {{-- title --}}
                        <h2 class="ark-title-tech mb-15">Tecnologias utilizadas</h2>
                        {{-- suptitle --}}
                        <div class="mt-5 row text-center">
                            @php
                                $images = get_field('technologies');
                            @endphp

                            @foreach ($images as $image)
                                <div class="mb-5 col-3">
                                    <div class="ark-img-tech">
                                        <div>
                                            <img src="{!! $image['url'] !!}" alt="{{ $image['alt'] }}" />
                                            <p>{{ $image['caption'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- main title end --}}
                </div>
                {{-- banner overlay end --}}
            </div>
            {{-- banner end --}}

        </div>
        {{-- col end --}}
    </div>
    {{-- row end --}}

</div>
{{-- container end --}}

{{-- container --}}
<div class="container-fluid">

    {{-- row --}}
    <div class="row p-60-0 p-lg-30-0 p-md-15-0">
        {{-- col --}}
        <div class="col-lg-12">

            {{-- banner --}}
            <div class="ark-a ark-banner ark-bg-course">
                {{-- banner back --}}
                <div class="ark-banner-back"></div>
                {{-- banner dec --}}
                <div class="ark-banner-dec"></div>
                {{-- banner overlay --}}
                <div class="ark-banner-overlay ark-course-overlay-white">
                    {{-- main title --}}
                    <div class="ark-banner-title">
                        {{-- title --}}
                        <h2 class="ark-title-tech mb-15">Conceitos que você irá aprender</h2>

                        <ul class="ark-concepts ark-custom-list">
                            @php
                                $concenpts = get_field('concepts');
                                $concenpts_arr = explode("\n", $concenpts);
                                $concenpts_arr = array_map('trim', $concenpts_arr);
                            @endphp

                            @foreach ($concenpts_arr as $concenpt)
                                <li class="fs-14 text-white-dark">{{ $concenpt }}</li>
                            @endforeach
                        </ul>

                    </div>
                    {{-- main title end --}}
                </div>
                {{-- banner overlay end --}}
            </div>
            {{-- banner end --}}

        </div>
        {{-- col end --}}
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

            {{-- section title --}}
            <div class="ark-section-title">
                {{-- title frame --}}
                <div class="ark-title-frame">
                    {{-- title --}}
                    <h4 class="mb-15 mt-5">Módulos deste curso</h4>
                </div>
                {{-- title frame end --}}
            </div>
            {{-- section title end --}}

        </div>
        {{-- col end --}}

        {{-- col --}}
        @php

            $modules_title = get_field('title_module');
            $modules_arr = explode("\n", $modules_title);
            $modules_arr = array_map('trim', $modules_arr);
            $m = 0;

            $modules_content = get_field('content_module');
            $modules_content_arr = explode("\n", $modules_content);
            $modules_content_arr = array_map('trim', $modules_content_arr);

            $modules_combine = array_map(null, $modules_arr, $modules_content_arr);

        @endphp

        @foreach ($modules_combine as $module)
            @php $m++; @endphp
            <div class="col-md-6">

                {{-- service --}}
                <div style="min-height: 335px" class="ark-a ark-service-icon-box">
                    {{-- service content --}}
                    <div class="ark-service-ib-content">
                        {{-- title --}}
                        <div class="mb-15 ark-title-tech">
                            <h5>Módulo {{ $m }}</h5>
                            <h6>{{ $module[0] }}</h6>
                        </div>

                        {{-- text --}}
                        <p class="mb-15 fs-14 text-white-dark ark-subline">
                            {!! $module[1] !!}
                        </p>

                    </div>
                    {{-- service content end --}}
                </div>
                {{-- service end --}}

            </div>
            {{-- col end --}}

        @endforeach

    </div>
    {{-- row end --}}

</div>
{{-- container end --}}

{{-- container --}}
<div class="container-fluid">

    {{-- row --}}
    <div class="row p-60-0 p-lg-30-0 p-md-15-0">
        {{-- col --}}
        <div class="col-lg-12">

            {{-- banner --}}
            <div class="ark-a ark-banner ark-bg-course">
                {{-- banner back --}}
                <div class="ark-banner-back"></div>
                {{-- banner dec --}}
                <div class="ark-banner-dec"></div>
                {{-- banner overlay --}}
                <div class="ark-banner-overlay ark-course-overlay-white">
                    {{-- main title --}}
                    <div class="ark-banner-title">
                        {{-- title --}}
                        <h2 class="ark-title-tech mb-15">{{ get_field('title_launch') }}</h2>

                        <p class="ark-subline fs-14 text-white-dark">
                            {!! get_field('launch_content') !!}
                        </p>

                    </div>
                    {{-- main title end --}}
                </div>
                {{-- banner overlay end --}}
            </div>
            {{-- banner end --}}

        </div>
        {{-- col end --}}
    </div>
    {{-- row end --}}

</div>
{{-- container end --}}

{{-- container --}}
<div class="container-fluid">

    {{-- row --}}
    <div class="row mt-5 p-0-0 justify-content-center">

        {{-- col --}}
        <div class="col-lg-10">

            {{-- price --}}
            <div class="ark-a ark-price">
                {{-- price body --}}
                <div class="ark-price-body">
                    <h5 class="mb-30">De <span>R${{ get_field('old_value') }}</span> por apenas</h5>
                    {{-- price cost --}}
                    <div class="ark-price-cost">
                        <div class="ark-number"><span>12x de </span>R${{ get_field('value') }}</div>
                    </div>
                    {{-- price cost end --}}
                    {{-- price list --}}
                    <ul class="ark-price-list">
                        {{-- list item --}}
                        <li class="fs-14 text-white-dark">Acesso a todos os módulos</li>
                        {{-- list item --}}
                        <li class="fs-14 text-white-dark">Código de todo o projeto separado em commits</li>
                        {{-- list item --}}
                        <li class="fs-14 text-white-dark">Contato direto com os instrutores</li>
                        {{-- list item --}}
                        <li class="fs-14 text-white-dark">Aulas extras exclusivas durante o curso</li>
                    </ul>
                    {{-- price list end --}}
                    {{-- button --}}
                    <a href="#" class="ark-link ark-color-link ark-w-chevron">Comprar o curso</a>
                    {{-- <div class="ark-asterisk">Verificar disponibilidade</div> --}}
                </div>
                {{-- price body end --}}
            </div>
            {{-- price end --}}

        </div>
        {{-- grid --}}

    </div>
    {{-- row end --}}

</div>
{{-- container end --}}

{{-- Component Reviews --}}
{{-- @include('components.course-reviews') --}}
{{-- Component Reviews  End --}}

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
                    <h4>FAQs</h4>
                </div>
                {{-- title frame end --}}
            </div>
            {{-- section title end --}}

            {{-- timeline --}}
            <div class="ark-timeline ark-gallery">
                <div class="ark-timeline-item">
                    <div class="ark-timeline-mark-light"></div>
                    <div class="ark-timeline-mark"></div>

                    <div class="ark-a ark-timeline-content">
                        <div class="ark-card-header">
                            <div class="mb-15 ark-left-side ark-title-tech">
                                <h5>O que preciso saber para o curso?</h5>
                            </div>
                        </div>

                        <p>Um conhecimento básico de PHP é necessário para maior entendimento
                            do curso, mas todo o conteúdo será explicado em detalhes
                            e todas as perguntas/dúvidas serão respondidas.</p>
                    </div>
                </div>

                <div class="ark-timeline-item">
                    <div class="ark-timeline-mark-light"></div>
                    <div class="ark-timeline-mark"></div>

                    <div class="ark-a ark-timeline-content">
                        <div class="ark-card-header">
                            <div class="mb-15 ark-left-side ark-title-tech">
                                <h5>Onde os vídeos serão publicados?</h5>
                            </div>
                        </div>

                        <p>Os vídeos serão publicados na Udemy, com o mesmo funcionamento
                            que já existe, vídeos offline,
                            autoplay, acelerar em 2x, aplicativo nativo e mais.</p>
                    </div>
                </div>

                <div class="ark-timeline-item">
                    <div class="ark-timeline-mark-light"></div>
                    <div class="ark-timeline-mark"></div>

                    <div class="ark-a ark-timeline-content">
                        <div class="ark-card-header">
                            <div class="mb-15 ark-left-side ark-title-tech">
                                <h5>Quanto tempo tenho para fazer o curso?</h5>
                            </div>
                        </div>

                        <p>O curso é vitalício, faça quantas vezes quiser e quando quiser,
                            nada de bloqueios ou pressa.</p>
                    </div>
                </div>

                <div class="ark-timeline-item">
                    <div class="ark-timeline-mark-light"></div>
                    <div class="ark-timeline-mark"></div>

                    <div class="ark-a ark-timeline-content">
                        <div class="ark-card-header">
                            <div class="mb-15 ark-left-side ark-title-tech">
                                <h5>Esse curso tem certificado?</h5>
                            </div>
                        </div>

                        <p>Sim, o curso terá certificado e você poderá baixá-lo
                            diretamente da Udemy ao término do curso.</p>
                    </div>
                </div>

                <div class="ark-timeline-item">
                    <div class="ark-timeline-mark-light"></div>
                    <div class="ark-timeline-mark"></div>

                    <div class="ark-a ark-timeline-content">
                        <div class="ark-card-header">
                            <div class="mb-15 ark-left-side ark-title-tech">
                                <h5>Posso usar o projeto para o meu Portfólio?</h5>
                            </div>
                        </div>

                        <p>Definitivamente! A ideia é que vocês tenham um projeto de verdade que possam utilizar como
                            bem
                            entenderem.</p>
                    </div>
                </div>

                <div class="ark-timeline-item">
                    <div class="ark-timeline-mark-light"></div>
                    <div class="ark-timeline-mark"></div>

                    <div class="ark-a ark-timeline-content">
                        <div class="ark-card-header">
                            <div class="mb-15 ark-left-side ark-title-tech">
                                <h5>Eu tenho outra dúvida!</h5>
                            </div>
                        </div>

                        <p>Sem problemas! Você pode acessar qualquer uma das minhas redes sociais ou entrar no slack do
                            nosso curso.</p>
                    </div>
                </div>

            </div>
            {{-- timeline end --}}

        </div>

    </div>
    {{-- row end --}}

</div>
{{-- container end --}}
