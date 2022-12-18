@extends('layouts.create', ["page_title"=>"Create New Customer","parth"=>"../.."])

@section('style-links-create')

@endsection
@section('Component-Home-Action',route('cutomer_home'))
@section('content-form-action',route('cutomer_store'))
<!-- Page Action Buttons -->
@section('page-action-buttons')
<a type="button" name="save" id="save" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-floppy me-1"></i> Save</a>
@endsection
@section('crate-content')
<div class="row">
    <div class="col-12 col-sm-4 col-lg-4">
    </div>
    <div class="col-12 col-sm-6 col-lg-6">
        <div class="row mb-1 p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="cusnam">Customer Name<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-5 col-lg-5">
                <input class="form-control form-control-sm" type="text" id="cusnam" name="cusnam" value="{{old('cusnam')}}">
            </div>
        </div>

        <div class="row mb-1  p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="cutcod">Customer Code<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-5 col-lg-5">
                <input class="form-control form-control-sm" type="text" id="cutcod" name="cutcod" value="{{old('cutcod',$customercode)}}">
            </div>
        </div>

        <div class="row mb-1  p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="cutadrs">Customer Address<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-5 col-lg-5">
                <input class="form-control form-control-sm" type="text" id="cutadrs" name="cutadrs" value="{{old('cutadrs')}}">
            </div>
        </div>

        <div class="row mb-1  p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="cutcontct">Customer Contact<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-4 col-lg-4">
                <input class="form-control form-control-sm integer" type="text" id="cutcontct" name="cutcontct" value="{{old('cutcontct')}}" minlength="10" maxlength="10">
            </div>
        </div>
    </div>
   
</div>

@endsection

@section('create-js')
<script src="{{url('assets/js/blade/customer/customer_create.js')}}"></script>
@endsection

