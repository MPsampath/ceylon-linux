@extends('layouts.create', ["page_title"=>"Create New Place Order","parth"=>"../.."])

@section('style-links-create')

@endsection
@section('Component-Home-Action',route('place_order_home'))
@section('content-form-action',route('place_order_store'))
<!-- Page Action Buttons -->
@section('page-action-buttons')
<a type="button" name="save" id="save" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-floppy me-1"></i> Save</a>
@endsection
@section('crate-content')
<div class="row">
    <div class="col-12 col-sm-4 col-lg-4">
    </div>
    <div class="col-12 col-sm-6 col-lg-6">

        <div class="row mb-1  p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="customr">Customer<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-3 col-lg-3">
                <select class="form-control form-control-sm" name="customr" id="customr">
                        <option value=""></option>
                        @if (count($customers) > 0)
                                @foreach ($customers as $row)
                                    <option  value="{{ $row->cusId }}" >{{ $row->custNam }}</option>
                                @endforeach
                        @endif
                    </select>
            </div>
        </div>

        <div class="row mb-1  p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="ordnum">Order Number<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-4 col-lg-4">
                <input class="form-control form-control-sm" type="text" id="ordnum" name="ordnum" value="{{$ordcode}}">
            </div>
        </div>
    </div>
   
</div>
<div class="row">
    <div class="col-12 col-sm-1 col-lg-1"></div>
    <div class="col-12 col-sm-10 col-lg-10">
    <table class="table table-sm table-responsive-sm" id="product_table"  >
        <thead class="table-light freez">
            <tr>
                <th class="text-left">No</th>
                <th class="text-left">Product Name</th>
                <th class="text-left">Product Code</th>
                <th class="text-end">Price</th>
                <th class="text-end">Quntity</th>
                <th class="text-end">Free</th>
                <th class="text-end">Ammount</th>
            </tr>
            <tr>
                <th class="text-end">
                <div class="input-group float-end">
                    <button type="button" name="" id="btn-itemAdd" class="btn btn-success btn-sm" >Add</button>
                </div>
                </th>
                <th class="text-left">
                        <select class="form-control form-control-sm selectpicker" id="product" name="product">
                            <option value="" ></option>
                            @if(!empty($products))
                                @foreach ($products as $item)
                                    <option value="{{$item->proId}}" >{{$item->proNam}}</option>
                                @endforeach
                            @endif
                        </select>
                </th>
                <th class="text-left procode">
                       
                </th>
                <th class="text-end price">
                     
                </th>
                <th class="text-end" style="width: 200px;">
                        <input class="form-control form-control-sm integer" type="text" id="quntity" name="quntity" value="">
                </th>
                <th class="text-end free">
                </th>
                <th class="text-end amount">
                </th>
            </tr>
        </thead>
        <tbody id="body">

        </tbody>
    <tfoot>
    </tfoot>
    </table>
    </div>
    <div class="col-12 col-sm-1 col-lg-1"></div>
</div>

@endsection

@section('create-js')
<script type="text/javascript">
</script>

<script src="{{url('assets/js/blade/placeorder/place_order_create.js')}}"></script>
@endsection

