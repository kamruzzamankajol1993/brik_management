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
<form action="{{ route('admin.sell_to_shop.store') }}" method="post" >
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


                    <?php

                    $get_role_id = DB::table('model_has_roles')
                    ->where('model_id',Auth::guard('admin')->user()->id)->value('role_id');



                    ?>

                    @if($get_role_id == 1)

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
                    @else

                    <div class="form-group row mt-2">
                        <label for="" class="col-sm-4 col-form-label">Vendor Name</label>
                        <div class="col-sm-8">
                            <input class="form-control" value="{{ Auth::guard('admin')->user()->name }}" type="text" name="client_name" id="client_name" readonly>
                        </div>
                    </div>

                    @endif


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

                    @if($get_role_id == 1)

                    <div class="row" id="get_all_informationcc">

                    </div>
                    @else


                    <?php

$consigment_main_detail = DB::table('otherconsigmentdetails')->where('client_name',Auth::guard('admin')->user()->name)->get();


?>
                    <div class="row" >

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap table-check" id="dynamicAddRemove">
                                            <thead class="table-light">
                                            <tr>
                                                <th style="width:200px"> Product Name</th>

                                                <th>Qty</th>


                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>

                                                <td style="width:200px">
                                                    <select class=" form-control main_product_id select2" name="main_product_id[]" id="main_product_id0" >
                                                        <option value="0">Please Select</option>
                                                        @foreach($consigment_main_detail as $all_inventory_lists)
                                                        <option value="{{ $all_inventory_lists->product_name }}">{{ $all_inventory_lists->product_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>

                                                <td><input type="number" min="1" class="form-control p_quantity" name="p_quantity[]" id="p_quantity0" placeholder="Quantity"></td>


                                                <td>
                                                    {{-- <div class="d-flex gap-3">
                                                        <a href="javascript:void(0);" class="text-danger"><i
                                                                    class="mdi mdi-delete-forever font-size-22"></i></a>
                                                    </div> --}}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <button id="main_add_new_product" type="button" class="btn btn-light waves-effect btn-label waves-light"><i
                                                    class="bx bx-plus-medical label-icon "></i> Add New Product
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    @endif

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

@if($get_role_id == 1)



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
@else

@section('script')
<script type="text/javascript">
    var i = 0;
    $("#main_add_new_product").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td style="width:200px"><select class=" form-control main_product_id select2" name="main_product_id[]" id="main_product_id'+i+'" ><option value="0">Please Select</option>@foreach($consigment_main_detail as $all_inventory_lists)<option value="{{ $all_inventory_lists->product_name }}">{{ $all_inventory_lists->product_name }}</option>@endforeach</select></td><td><input type="number" min="1" class="form-control p_quantity" name="p_quantity[]" id="p_quantity'+i+'" placeholder="Quantity"></td> <td><button type="button" class="btn btn-sm btn-outline-danger remove-input-field"><i class="mdi mdi-delete-forever font-size-22"></i></button></td></tr>'
            );
            $('.select2').select2();
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
@endsection

@endif


