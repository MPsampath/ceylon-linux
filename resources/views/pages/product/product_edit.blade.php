@extends('layouts.create', ["page_title"=>"Update Product","parth"=>"../.."])

@section('style-links-create')

@endsection
@section('Component-Home-Action',route('product_home'))
@section('content-form-action',route('product_update'))
<!-- Page Action Buttons -->
@section('page-action-buttons')
<a type="button" name="save" id="save" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-floppy me-1"></i> Save</a>
@endsection
@section('crate-content')
<div class="row">
    <div class="col-12 col-sm-4 col-lg-4">
    <input id='prid' name="prid" value='{{$productData->proId}}' hidden />
    </div>
    <div class="col-12 col-sm-6 col-lg-6">
        <div class="row mb-1 p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="pronam">Product Name<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-5 col-lg-5">
                <input class="form-control form-control-sm" type="text" id="pronam" name="pronam" value="{{$productData->proNam}}">
            </div>
        </div>

        <div class="row mb-1  p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="procod">Product Code<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-5 col-lg-5">
                <input class="form-control form-control-sm" type="text" id="procod" name="procod" value="{{$productData->code}}">
            </div>
        </div>

        <div class="row mb-1  p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="price">Price<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-5 col-lg-5">
                <input class="form-control form-control-sm integer" type="text" id="price" name="price" value="{{$productData->cost}}">
            </div>
        </div>

        <div class="row mb-1  p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="expdat">Expiry Date<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-4 col-lg-4">
                <input class="form-control form-control-sm integer" type="date" id="expdat" name="expdat" value="{{$productData->expdt}}" >
            </div>
        </div>
    </div>
   
</div>

@endsection

@section('create-js')
<script type="text/javascript">
</script>

<script src="{{url('assets/js/blade/product/product_create.js')}}"></script>
@endsection

