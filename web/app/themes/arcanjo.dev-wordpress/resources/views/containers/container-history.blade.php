{{-- content --}}
<div class="ark-content">
    {{-- curtain --}}
    <div class="ark-curtain"></div>

    @include('components.top-background')

    {{-- swup container --}}
    <div class="transition-fade" id="swup">
        {{-- scroll frame --}}
        <div id="scrollbar" class="ark-scroll-frame">

            @include('partials.content-history')
            {{-- @include('components.brand') --}}

            {{-- container --}}
            <div class="container-fluid mt-5">
                @include('components.footer')
            </div>
            {{-- container end --}}
        </div>
        {{-- scroll frame end --}}
    </div>
    {{-- swup container end --}}
</div>
{{-- content end --}}
