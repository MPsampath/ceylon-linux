@extends('layouts.app')
@section('style-links')
    @yield('style-links-preview')
@endsection
@section('content')
<div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <h4 class="page-title">@yield('Component-Home-Title') {{-- {{$page_title}} --}}</h4>
                        </div>
                        <div class="col-auto">
                            <div class="text-lg-end my-1 my-lg-0">
                            <a type="button" class="btn btn-danger waves-effect waves-light" href="@if(isset($closeAction)){{$closeAction}}@else @yield('Component-Home-Action')@endif" title="Close">Close<i class="mdi mdi-close"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card -->
            <div class="" id="viewCard">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                @yield('preview-content')
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-body -->

        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('page-js-scripts')

@endsection