<!doctype html>
<html {!! get_language_attributes() !!} class="theme--dark">
@include('layouts.head')

<body @php body_class() @endphp>
    {{-- Google Tag Manager (noscript) --}}
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NFSDLX3" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    {{-- End Google Tag Manager (noscript) --}}
    @php do_action('get_header') @endphp
    @include('layouts.header')
    <main id="app" class="ark-app">
        @yield('content')
    </main>
    @include('components.preloader')
    @php do_action('get_footer') @endphp
    @php wp_footer() @endphp
    @include('layouts.footer')
</body>

</html>
