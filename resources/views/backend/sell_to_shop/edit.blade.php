@extends('backend.master.master')

@section('title')
Update Sell To Shop |{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<!-- start page title -->
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Update Sell To Shop </h4>

        </div>
    </div>

</div>
<!-- end page title -->
<form action="{{ route('admin.sell_to_shop.update') }}" method="post" >

    <input type="hidden" value="{{ $consigment_detail->id }}" name="id" />
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
                            <input class="form-control" value="{{ $consigment_detail->main_date }}" type="date" id="" name="main_date">
                        </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label for="" class="col-sm-4 col-form-label">Consignment Number
                            </label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" value="{{ $consigment_detail->consignment_number }}" name="consignment_number">
                        </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label for="" class="col-sm-4 col-form-label">Select Client</label>
                        <div class="col-sm-8">
                            <select name="client_name" id="client_name" class="form-control">
                                <option value="">-- Please Select --</option>
                                @foreach($client_lists as $all_client_lists)
                                <option value="{{ $all_client_lists->name }}" {{ $consigment_detail->name == $all_client_lists->name ? 'selected':''}}>{{ $all_client_lists->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label for="" class="col-sm-4 col-form-label">Shop Name</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="shop_name" value="{{ $consigment_detail->shop_name }}" id="shop_name">
                        </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label for="" class="col-sm-4 col-form-label">Delivery Address</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="delivery_address" value="{{ $consigment_detail->delivery_address }}" id="delivery_address">
                        </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label for="" class="col-sm-4 col-form-label">Contact No</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="contact" value="{{ $consigment_detail->contact }}" id="contact">
                        </div>
                    </div>









                    <p class="card-title-desc">Enter The Requested Product</p>

                    <div class="row" id="get_all_informationcc">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap table-check" id="dynamicAddRemove">
                                            <thead class="table-light">
                                            <tr>
                                                <th style="width:200px"> Product Name</th>

                                                <th>Qty</th>
                                                <th>Price</th>

                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($consigment_main_detail as $all_consigment_main_detail)



                                                @if(($loop->index+1) == 1)
                                            <tr>

                                                <td style="width:200px">
                                                    <input type="hidden"  class="form-control" name="p_p_id[]" id="p_p_id{{ $loop->index+5000  }}" value="{{ $all_consigment_main_detail->product_name }}" placeholder="pid">
                                                    <select class=" form-control main_product_id select2" name="main_product_id[]" id="main_product_id{{ $loop->index+5000 }}" >
                                                        <option value="0">Please Select</option>
                                                        @foreach($Inventory_lists as $all_inventory_lists)
                                                        <option value="{{ $all_inventory_lists->product_name }}" {{ $all_inventory_lists->product_name == $all_consigment_main_detail->product_name ? 'selected':'' }}>{{ $all_inventory_lists->product_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>

                                                <td>
                                                    <input type="number" min="1" class="form-control p_quantity" name="p_quantity[]" id="p_quantity{{ $loop->index+5000 }}" value="{{ $all_consigment_main_detail->quantity }}" placeholder="Quantity">
                                                    <input type="hidden"  class="form-control" name="d_quantity[]" id="d_quantity{{ $loop->index+5000 }}" value="{{ $all_consigment_main_detail->quantity }}" placeholder="dQuantity">
                                                </td>


                                                <td>
                                                    {{-- <div class="d-flex gap-3">
                                                        <a href="javascript:void(0);" class="text-danger"><i
                                                                    class="mdi mdi-delete-forever font-size-22"></i></a>
                                                    </div> --}}
                                                </td>
                                            </tr>
                                            @else


                                            <tr>

                                                <td style="width:200px">
                                                    <input type="hidden"  class="form-control" name="p_p_id[]" id="p_p_id{{ $loop->index+5000  }}" value="{{ $all_consigment_main_detail->product_name }}" placeholder="pid">
                                                    <select class=" form-control main_product_id select2" name="main_product_id[]" id="main_product_id{{ $loop->index+5000 }}" >
                                                        <option value="0">Please Select</option>
                                                        @foreach($Inventory_lists as $all_inventory_lists)
                                                        <option value="{{ $all_inventory_lists->product_name }}" {{ $all_inventory_lists->product_name == $all_consigment_main_detail->product_name ? 'selected':'' }}>{{ $all_inventory_lists->product_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>

                                                <td>
                                                    <input type="number" min="1" class="form-control p_quantity" name="p_quantity[]" id="p_quantity{{ $loop->index+5000 }}" value="{{ $all_consigment_main_detail->quantity }}" placeholder="Quantity">
                                                    <input type="hidden"  class="form-control" name="d_quantity[]" id="d_quantity{{ $loop->index+5000 }}" value="{{ $all_consigment_main_detail->quantity }}" placeholder="dQuantity">
                                                </td>


                                                <td>
                                                    <button
                                                    type="button" class="btn btn-sm btn-outline-danger remove-input-field"><i class="mdi mdi-delete-forever font-size-22"></i></button>
                                                </td>
                                            </tr>


                                            @endif
                                            @endforeach
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

                    <div class="row">
                        <div class="col-12">
                            <div class="float-right d-none d-md-block">
                                <div class="form-group mb-4">
                                    <div>
                                        <button type="submit"
                                            class="btn btn-primary btn-lg  waves-effect waves-light mr-1" onclick="window.location.href='new_invoice_generate_view.php'">
                                            Update
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
<script type="text/javascript">
    var i = 0;
    $("#main_add_new_product").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td style="width:200px"><input type="hidden" value="0" id="p_p_id'+i+'" name="p_p_id[]"/><select class=" form-control main_product_id select2" name="main_product_id[]" id="main_product_id'+i+'" ><option value="0">Please Select</option>@foreach($Inventory_lists as $all_inventory_lists)<option value="{{ $all_inventory_lists->product_name }}">{{ $all_inventory_lists->product_name }}</option>@endforeach</select></td><td><input type="number" min="1" class="form-control p_quantity" name="p_quantity[]" id="p_quantity'+i+'" placeholder="Quantity"><input type="hidden" class="form-control" value="0"  name="d_quantity[]" id="d_quantity'+i+'" placeholder="dQuantity"></td><td><button type="button" class="btn btn-sm btn-outline-danger remove-input-field"><i class="mdi mdi-delete-forever font-size-22"></i></button></td></tr>'
            );
            $('.select2').select2();
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>

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


