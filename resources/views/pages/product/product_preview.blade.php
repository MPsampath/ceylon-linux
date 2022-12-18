@extends('layouts.preview', ["page_title"=>"Product Preview","parth"=>"../.."])


<!-- Component Details -->
@section('Component-Home-Title','Product Preview')
@section('Component-Home-Action',route('product_home'))


<!-- Content Form -->
@section('preview-content')
<div class="row">
<input id='pgid' name="pgid" value='' hidden />
<div class="col-12 col-md-3 col-xl-3"></div>
    <div class="col-12 col-md-6 col-xl-6">
        <table class="table table-sm table-striped p-2 mb-2">
            <tr class="p-2">
                <th>Product Name</th>
                <td>{{$productData->proNam}}</td>
            </tr>
            <tr class="p-2">
                <th>Product Code</th>
                <td>{{$productData->code}}</td>
            </tr>
            <tr class="p-2">
                <th>Price</th>
                <td>{{$productData->cost}}</td>
            </tr>
            <tr class="p-2">
                <th>Expiry Date</th>
                <td>{{$productData->expdt}}</td>
            </tr>
        </table>
    </div>
<div class="col-12 col-md-3 col-xl-3"></div>

</div>
@endsection