@extends('layouts.create', ["page_title"=>"Create New Free Issue","parth"=>"../.."])

@section('style-links-create')

@endsection
@section('Component-Home-Action',route('free_issue_home'))
@section('content-form-action',route('free_issue_store'))
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
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="fril">Free Issue Lable<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-5 col-lg-5">
                <input class="form-control form-control-sm" type="text" id="fril" name="fril" value="">
            </div>
        </div>

        <div class="row mb-1  p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="type">Type<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-3 col-lg-3">
                <select class="form-control form-control-sm" name="type" id="type">
                    <option value=""></option>
                    <option value="1">Flat</option>
                    <option value="2">Multiple</option>
                
                </select>
            </div>
        </div>

        <div class="row mb-1  p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="prchpro">Purches Product<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-4 col-lg-4">
                <select class="form-control form-control-sm" name="prchpro" id="prchpro">
                    <option value=""></option>
                    @if (count($products) > 0)
                            @foreach ($products as $row)
                                <option  value="{{ $row->proId }}" >{{ $row->proNam }}</option>
                            @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="row mb-1  p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="freeprdt">Free Product<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-4 col-lg-4">
                <select class="form-control form-control-sm" name="freeprdt" id="freeprdt">
                <option value=""></option>
                    @if (count($products) > 0)
                            @foreach ($products as $row)
                                <option  value="{{ $row->proId }}" >{{ $row->proNam }}</option>
                            @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="row mb-1  p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="prchqty">Purches Quantity<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-2 col-lg-2">
                <input class="form-control form-control-sm integer" type="text" id="prchqty" name="prchqty" value="">
            </div>
        </div>

        <div class="row mb-1  p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="freeqty">Free Quantity<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-2 col-lg-2">
                <input class="form-control form-control-sm integer" type="text" id="freeqty" name="freeqty" value="">
            </div>
        </div>

        <div class="row mb-1  p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="lowrlmt">Lower limit<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-2 col-lg-2">
                <input class="form-control form-control-sm integer" type="text" id="lowrlmt" name="lowrlmt" value="">
            </div>
        </div>

        <div class="row mb-1  p-2">
            <label class="col-12 col-sm-4 col-lg-4 col-form-label-md" for="uprlimt">Upper Limit<span class="text-danger"> *</span></label>
            <div class="col-12 col-sm-2 col-lg-2">
                <input class="form-control form-control-sm integer" type="text" id="uprlimt" name="uprlimt" value="">
            </div>
        </div>
    </div>
   
</div>

@endsection

@section('create-js')
<script type="text/javascript">
</script>

<script src="{{url('assets/js/blade/freeissue/free_issue_create.js')}}"></script>
@endsection

