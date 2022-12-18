@extends('layouts.create', ["page_title"=>"Edit Customer","parth"=>"../.."])

@section('style-links-create')

@endsection
@section('Component-Home-Action',route('cutomer_home'))
@section('content-form-action',route('cutomer_update'))
<!-- Page Action Buttons -->
@section('page-action-buttons')
<a type="button" name="save" id="save" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-floppy me-1"></i> Save</a>
@endsection
@section('crate-content')
<div class="row p-2">
    <div class="col-12 col-sm-3 col-lg-3">
    <input id='cuid' name="cuid" value='{{$customerData->cusId}}' hidden />
    </div>
    <div class="col-12 col-sm-6 col-lg-6">
        <div class="row mb-1 p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="cusnam">Customer Name<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-5 col-lg-5">
                <input class="form-control form-control-sm" type="text" id="cusnam" name="cusnam" value="{{$customerData->custNam}}">
            </div>
        </div>

        <div class="row mb-1  p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="cutcod">Customer Code<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-5 col-lg-5">
                <input class="form-control form-control-sm" type="text" id="cutcod" name="cutcod" value="{{$customerData->custCode}}">
            </div>
        </div>

        <div class="row mb-1  p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="cutadrs">Customer Address<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-5 col-lg-5">
                <input class="form-control form-control-sm" type="text" id="cutadrs" name="cutadrs" value="{{$customerData->cuadrs}}">
            </div>
        </div>

        <div class="row mb-1  p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="cutcontct">Customer Contact<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-4 col-lg-4">
                <input class="form-control form-control-sm integer" type="text" id="cutcontct" name="cutcontct" value="{{$customerData->mobilnum}}" minlength="10" maxlength="10">
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-3 col-lg-3">
    </div>
</div>

@endsection

@section('create-js')
<script src="{{url('assets/js/blade/customer/customer_create.js')}}"></script>
@endsection

