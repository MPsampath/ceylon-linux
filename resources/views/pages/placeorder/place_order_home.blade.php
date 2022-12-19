@extends('layouts.home')

@section('style-links-home')

@endsection
@section('home-content')
    <div class="row pb-2">
        <div class="col-12 col-xl-1 col-sm-1">
            <div class="row">
            <a  href="{{ route('place_order_create') }}">
                <button type="button" class="btn btn-primary">Create</button>
            </a>
            </div>
        </div>
    </div>

    <div class="row pb-2">
        <table id="place_order_table" class="table table-striped dt-responsive nowrap w-100 p-2">
                <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Customer Name</th>
                        <th>Order Date</th>
                        <th>Order Time</th>
                        <th>Net Amount</th>
                        <th class="text-end" style="width: 200px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($homedata) > 0)
                        @foreach ($homedata as $freis)
                                <tr>
                                    <td>{{$freis->ordernum}}</td>
                                    <td>{{$freis->custnm}}</td>
                                    <td>{{$freis->orderdate}}</td>
                                    <td>{{$freis->ordertime}}</td>
                                    <td>{{$freis->netammount}}</td>
                                    <td class="text-end" style="width: 200px;">
                                        <div class="btn-group p-2">
                                            <button type="button" data-poid="{{$freis->poId}}" class="btn btn-success preview">Preview</button>
                                            <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" style="min-width: 115px;max-width: 115px;">
                                                <a class="dropdown-item edit" data-poid="{{$freis->poId}}"  href="#">Edit</a>
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
var place_order_preview = "{{route('place_order_preview')}}";
var place_order_edit = "{{route('place_order_edit')}}";
</script>

<script src="{{url('assets/js/blade/placeorder/place_order_home.js')}}"></script>
@endsection