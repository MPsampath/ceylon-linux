@extends('layouts.app')
@section('style-links')
    @yield('style-links-create')
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h4 class="page-title">{{$page_title}}</h4>
                    </div>
                    <div class="col-auto">
                        <div class="text-lg-end my-1 my-lg-0">
                            @yield('page-action-buttons')
                            {{--btn-outline-danger--}}
                            <a type="button" class="btn btn-danger waves-effect waves-light" href="@if(isset($closeAction)){{$closeAction}}@else @yield('Component-Home-Action')@endif" title="Close">Close<i class="mdi mdi-close"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-between">
                <form class="form-horizontal" action="@yield('content-form-action')" name="mfrm" id="mfrm" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @if(isset($errors) && count($errors)>0)
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <i class="mdi mdi-alert-outline me-2"></i> {{$error}}
                        </div>
                        @endforeach
                        <br>
                    @endif
                    @yield('crate-content')
                </form>
                </div>
            </div> <!-- end card-body -->
            <div id="card-loader" class="card-disabled" style="display:none;"><div class="card-portlets-loader"></div></div>
        </div> <!-- end card -->
    </div> <!-- end col -->
</div> <!-- end row -->
@yield('create-js')

@endsection
@section('page-js-scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
@endsection