@extends('layouts.home')

@section('style-links-home')

@endsection
@section('home-content')
    <div class="row pb-2">
        <div class="col-12 col-xl-1 col-sm-1">
            <div class="row">
            <a  href="{{ route('cutomer_create') }}">
                <button type="button" class="btn btn-primary">Create</button>
            </a>
            </div>
        </div>
    </div>

    <div class="row pb-2">
        <table id="customer_table" class="table table-striped dt-responsive nowrap w-100 p-2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Customer Name</th>
                        <th>Customer Code</th>
                        <th>Customer Address</th>
                        <th>Customer Contact</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($allCustomers) > 0)
                            @php
                                $number = 0;
                            @endphp
                        @foreach ($allCustomers as $cust)
                                <tr>
                                    <td>{{++$number.'.'}}</td>
                                    <td>{{$cust->custNam}}</td>
                                    <td>{{$cust->custCode}}</td>
                                    <td>{{$cust->cuadrs}}</td>
                                    <td>{{$cust->mobilnum}}</td>
                                    <td class="text-end">
                                        <div class="btn-group p-2">
                                            <button type="button" data-custid="{{$cust->cusId}}" class="btn btn-success preview">Preview</button>
                                            <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" style="min-width: 115px;max-width: 115px;">
                                                <a class="dropdown-item edit" data-custid="{{$cust->cusId}}"  href="#">Edit</a>
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
var cutomer_preview = "{{route('cutomer_preview')}}";
var cutomer_edit = "{{route('cutomer_edit')}}";
</script>

<script src="{{url('assets/js/blade/customer/customer_home.js')}}"></script>
@endsection