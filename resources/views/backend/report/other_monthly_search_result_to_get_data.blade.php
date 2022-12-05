<div class="col-sm-12">

    <div class="table-responsive">
        <table class="table table-bordered dt-responsive nowrap"
        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                <th>SL</th>

                                        <th>Product Name</th>

                                        <th>Quantity</th>
                                      
                                        <th>Selling Date</th>


                                                </tr>

                                            </thead>
                                            <tbody>
                                                @foreach($get_id_from_main as $key=>$all_get_id_from_main)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $all_get_id_from_main->product_name }}</td>
                                                    <td>{{ $all_get_id_from_main->quantity }}</td>

                                                    <td>{{ $all_get_id_from_main->updated_at->format('d-m-Y') }}</td>
                                                </tr>
                                                @endforeach

                                            </tbody>
        </table>
    </div>

</div>
