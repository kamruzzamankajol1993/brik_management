@extends('backend.master.master')

@section('title')
Brick Sell Report |{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Brick Sell Report </h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li> --}}
                    <li class="breadcrumb-item active">Brick Sell Report </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<from>
<div class="row">

    <div class="col-md-6">

    <div class="form-group row mt-2">
        <label for="" class="col-sm-4 col-form-label">Search Type</label>
        <div class="col-sm-8">
            <select name="search_type" id="search_type" class="form-control">
                <option value="">-- Please Select --</option>
                <option value="monthly">Monthly</option>
                <option value="yearly">Yearly</option>
                <option value="datewise">Datewise</option>
            </select>
        </div>
    </div>

    <div id="search_area">
        
    </div>
</div>
</div>
</from>
@endsection


@section('script')
<script>
    $("#search_type").change(function(){

        var search_type = $(this).val();



        $.ajax({
url: "{{ route('get_search_data') }}",
method: 'GET',
data: {search_type:search_type},
success: function(data) {
  $("#tttt").html('');
  $("#tttt").html(data);
}
});
    });
</script>

@endsection
