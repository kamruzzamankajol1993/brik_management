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
