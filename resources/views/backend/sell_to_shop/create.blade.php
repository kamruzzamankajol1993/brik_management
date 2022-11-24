@extends('backend.master.master')

@section('title')
Sell To Shop |{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<!-- start page title -->
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Add New Product </h4>

        </div>
    </div>

</div>
<!-- end page title -->
<form action="{{ route('admin.other_consigment.store') }}" method="post" >
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    <p class="card-title-desc">Please Fill Up The Form Carefully</p>

                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Enter
                            Date</label>
                        <div class="col-sm-8">
                            <input class="form-control" value="<?php echo date('Y-m-d');?>" type="date" id="" name="main_date">
                        </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label for="" class="col-sm-4 col-form-label">Invoice Number
                            </label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" value="<?php echo substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,10);?>" name="consignment_number">
                        </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label for="" class="col-sm-4 col-form-label">Select Vendor</label>
                        <div class="col-sm-8">
                            <select name="client_name" id="client_name" class="form-control">
                                <option value="">-- Please Select --</option>
                                @foreach($client_lists as $all_client_lists)
                                <option value="{{ $all_client_lists->name }}">{{ $all_client_lists->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group row mt-2">
                        <label for="" class="col-sm-4 col-form-label">Shop Name</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="shop_name" id="shop_name">
                        </div>
                    </div>



                    <div class="form-group row mt-2">
                        <label for="" class="col-sm-4 col-form-label">Shop Address</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="delivery_address" id="delivery_address">
                        </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label for="" class="col-sm-4 col-form-label">Shop Contact No</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="contact" id="contact">
                        </div>
                    </div>









                    <p class="card-title-desc mt-5">Enter The Requested Product</p>

                    <div class="row" id="get_all_informationcc">

                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="float-right d-none d-md-block">
                                <div class="form-group mb-4">
                                    <div>
                                        <button type="submit"
                                            class="btn btn-primary btn-lg  waves-effect waves-light mr-1" onclick="window.location.href='new_invoice_generate_view.php'">
                                            Submit
                                        </button>
                                        <button type="reset"
                                            class="btn btn-secondary btn-lg  waves-effect">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div> <!-- end col -->



    </div> <!-- end row -->
</form>
@endsection



@section('script')


<script>

$("#client_name").change(function(){

var main_value = $(this).val();

$.ajax({
url: "{{ route('get_assaign_product_to_vendor') }}",
method: 'GET',
data: {main_value:main_value},
success: function(data) {
$("#get_all_informationcc").html('');
$("#get_all_informationcc").html(data);
}
});

});

////////

$("#select_truck").change(function(){

var main_value = $(this).val();

$.ajax({
url: "{{ route('get_truck_name') }}",
method: 'GET',
data: {main_value:main_value},
success: function(data) {
$("#get_all_informationt").html('');
$("#get_all_informationt").html(data);
}
});

});

</script>
@endsection


