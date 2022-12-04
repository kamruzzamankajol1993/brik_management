@extends('backend.master.master')

@section('title')
Sell Report |{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Sell Report </h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li> --}}
                    <li class="breadcrumb-item active">Sell Report </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->


<div class="row">
    <div class="col-md-4">
        <center><a  href="{{ route('brick_sell_report') }}" type="button" class="btn btn-info">Brick Sell Report</a></center>
    </div>
    <div class="col-md-4">
        <center><a href="{{ route('other_sell_report') }}" type="button" class="btn btn-success">Other Sell Report</a></center>
    </div>

    <div class="col-md-4">
        <center><a href="{{ route('client_report') }}" type="button" class="btn btn-primary">Client Report</a></center>
    </div>
    </div>
@endsection


@section('script')
@endsection
