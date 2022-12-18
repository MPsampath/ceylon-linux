@extends('layouts.home')

@section('style-links-home')

@endsection
@section('home-content')
    <div class="row pb-2">
        <div class="col-12 col-xl-1 col-sm-1">
            <div class="row">
            <a  href="{{ route('free_issue_create') }}">
                <button type="button" class="btn btn-primary">Create</button>
            </a>
            </div>
        </div>
    </div>

    <div class="row pb-2">
        <table id="free_issue_table" class="table table-striped dt-responsive nowrap w-100 p-2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Free Issue Label</th>
                        <th>Type</th>
                        <th>Purchase Product</th>
                        <th>Free Product</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($homedata) > 0)
                            @php
                                $number = 0;
                            @endphp
                        @foreach ($homedata as $freis)
                                <tr>
                                    <td>{{++$number.'.'}}</td>
                                    <td>{{$freis->lable}}</td>
                                    <td>{{$freis->type}}</td>
                                    <td>{{$freis->purchsProd}}</td>
                                    <td>{{$freis->freeProd}}</td>
                                    <td class="text-end">
                                        <div class="btn-group p-2">
                                            <button type="button" data-friid="{{$freis->friId}}" class="btn btn-success preview">Preview</button>
                                            <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" style="min-width: 115px;max-width: 115px;">
                                                <a class="dropdown-item edit" data-friid="{{$freis->friId}}"  href="#">Edit</a>
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
var free_issue_preview = "{{route('free_issue_preview')}}";
var free_issue_edit = "{{route('free_issue_edit')}}";
</script>

<script src="{{url('assets/js/blade/freeissue/free_issue_home.js')}}"></script>
@endsection