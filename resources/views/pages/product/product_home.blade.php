@extends('layouts.home')

@section('style-links-home')

@endsection
@section('home-content')
    <div class="row pb-2">
        <div class="col-12 col-xl-1 col-sm-1">
            <div class="row">
            <a  href="{{ route('product_create') }}">
                <button type="button" class="btn btn-primary">Create</button>
            </a>
            </div>
        </div>
    </div>

    <div class="row pb-2">
        <table id="product_table" class="table table-striped dt-responsive nowrap w-100 p-2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Product Code</th>
                        <th>Price</th>
                        <th>Expiry Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($homedata) > 0)
                            @php
                                $number = 0;
                            @endphp
                        @foreach ($homedata as $cust)
                                <tr>
                                    <td>{{++$number.'.'}}</td>
                                    <td>{{$cust->proNam}}</td>
                                    <td>{{$cust->code}}</td>
                                    <td>{{$cust->cost}}</td>
                                    <td>{{$cust->expdt}}</td>
                                    <td class="text-end">
                                        <div class="btn-group p-2">
                                            <button type="button" data-proid="{{$cust->proId}}" class="btn btn-success preview">Preview</button>
                                            <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" style="min-width: 115px;max-width: 115px;">
                                                <a class="dropdown-item edit" data-proid="{{$cust->proId}}"  href="#">Edit</a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                    @endif
                </tbody>
            </table>
    </div>
@endsection
@section('home-js')
<!-- Define variables -->
<script type="text/javascript">
var product_preview = "{{route('product_preview')}}";
var product_edit = "{{route('product_edit')}}";
</script>

<script src="{{url('assets/js/blade/product/product_home.js')}}"></script>
@endsection