@extends('layouts.preview', ["page_title"=>"Free Issue Preview","parth"=>"../.."])


<!-- Component Details -->
@section('Component-Home-Title','Free Issue Preview')
@section('Component-Home-Action',route('free_issue_home'))


<!-- Content Form -->
@section('preview-content')
<div class="row">
<input id='pgid' name="pgid" value='' hidden />
<div class="col-12 col-md-3 col-xl-3"></div>
    <div class="col-12 col-md-6 col-xl-6">
        <table class="table table-sm table-striped p-2 mb-2">
            <tr class="p-2">
                <th>Free Issue Lable</th>
                <td>{{$freeisueData->lable}}</td>
            </tr>
            <tr class="p-2">
                <th>Type</th>
                <td>{{$freeisueData->type}}</td>
            </tr>
            <tr class="p-2">
                <th>Purches Product</th>
                <td>{{$freeisueData->purchsProd}}</td>
            </tr>
            <tr class="p-2">
                <th>Free Product</th>
                <td>{{$freeisueData->freeProd}}</td>
            </tr> 
            <tr class="p-2">
                <th>Purches Quantity</th>
                <td>{{$freeisueData->purcqty}}</td>
            </tr>
            <tr class="p-2">
                <th>Free Quantity</th>
                <td>{{$freeisueData->freeqty}}</td>
            </tr>
            <tr class="p-2">
                <th>Lower limit</th>
                <td>{{$freeisueData->lowlim}}</td>
            </tr>
            <tr class="p-2">
                <th>Upper Limit</th>
                <td>{{$freeisueData->uprlim}}</td>
            </tr>
        </table>
    </div>
<div class="col-12 col-md-3 col-xl-3"></div>

</div>
@endsection