@extends('layouts.app')

@section('content')
    {{-- app wrapper --}}
    <div class="ark-app-wrapper">
        {{-- app container --}}
        <div class="ark-app-container">

            @include('layouts.sidebar')
            @include('containers.container-course')
            @include('layouts.menu')

        </div>
        {{-- app container end --}}
    </div>
    {{-- app wrapper end --}}
@endsection
