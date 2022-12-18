@extends('layouts.preview', ["page_title"=>"Customer Preview","parth"=>"../.."])


<!-- Component Details -->
@section('Component-Home-Title','Customer Preview')
@section('Component-Home-Action',route('cutomer_home'))


<!-- Content Form -->
@section('preview-content')
<div class="row">
<input id='pgid' name="pgid" value='' hidden />
<div class="col-12 col-md-3 col-xl-3"></div>
    <div class="col-12 col-md-6 col-xl-6">
        <table class="table table-sm table-striped p-2 mb-2">
            <tr class="p-2">
                <th>Customer Name</th>
                <td>{{$customerData->custNam}}</td>
            </tr>
            <tr class="p-2">
                <th>Customer Code</th>
                <td>{{$customerData->custCode}}</td>
            </tr>
            <tr class="p-2">
                <th>Customer Address</th>
                <td>{{$customerData->cuadrs}}</td>
            </tr>
            <tr class="p-2">
                <th>Customer Mobile</th>
                <td>{{$customerData->mobilnum}}</td>
            </tr>
        </table>
    </div>
<div class="col-12 col-md-3 col-xl-3"></div>

</div>
@endsection