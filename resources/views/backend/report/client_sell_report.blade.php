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

    <div class="col-md-6" style="height: 350px;">

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

    <button  id="final_result_button" class="btn btn-primary mt-4">Submit</button>
</div>
</div>
</from>

<div class="row" id="get_search_result_data">
</div>
@endsection


@section('script')
<script>
    $("#search_type").change(function(){

        var search_type = $(this).val();

// alert(search_type);

        $.ajax({
url: "{{ route('get_search_data') }}",
method: 'GET',
data: {search_type:search_type},
success: function(data) {

    //console.log(data)
  $("#search_area").html('');
  $("#search_area").html(data);
}
});
    });

    //

    $("#final_result_button").click(function(){



        var search_type = $('#search_type').val();

        //alert(search_type);


        if(search_type == 'monthly'){


            var month_name = $('#month_name').val();
            var year_name = $('#year_name').val();

            //alert(22);



        $.ajax({
url: "{{ route('clientReport_monthly_search_result_to_get_data') }}",
method: 'GET',
data: {month_name:month_name,year_name:year_name},
success: function(data) {

    //console.log(data)
  $("#get_search_result_data").html('');
  $("#get_search_result_data").html(data);
}
});


}
if(search_type =='yearly'){
    //alert(222);
    var year_name = $('#year_name').val();


    $.ajax({
url: "{{ route('clientReport_yearly_search_result_to_get_data') }}",
method: 'GET',
data: {year_name:year_name},
success: function(data) {

    //console.log(data)
  $("#get_search_result_data").html('');
  $("#get_search_result_data").html(data);
}
});

}

if(search_type =='datewise'){
   // alert(2222);
   var from_date = $('#from_date').val();
   var to_date = $('#to_date').val();



   $.ajax({
url: "{{ route('clientReport_datewise_search_result_to_get_data') }}",
method: 'GET',
data: {from_date:from_date,to_date:to_date},
success: function(data) {

    //console.log(data)
  $("#get_search_result_data").html('');
  $("#get_search_result_data").html(data);
}
});

}





    });
</script>

@endsection
