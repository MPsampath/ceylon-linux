@extends('layouts.app')
@section('style-links')
    @yield('style-links-home')
@endsection
@section('content')
<div class="card ">
    <div class="p-5">
        @yield('home-content')
    </div>
</div>
@endsection
@section('page-js-scripts')

@yield('home-js')

@endsection