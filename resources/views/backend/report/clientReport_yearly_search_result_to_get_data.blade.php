<div class="col-sm-12">

    <div class="table-responsive">
        <table class="table table-bordered dt-responsive nowrap"
        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                <th>SL</th>

                                        <th>Client Name</th>

                                        <th>Total Buy Amount</th>




                                                </tr>

                                            </thead>
                                            <tbody>
                                                @foreach($get_id_from_main as $key=>$all_get_id_from_main)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $all_get_id_from_main->client_name }}</td>
                                                    <td>

                                                      <?php
                                               $get_id_all = DB::table('consignments')
                                               ->where('status',1)
                                               ->where('client_name',$all_get_id_from_main->client_name)
                                               ->whereYear('created_at', '=', $year_name)

                                               ->get();


                                    $convert_name_title = $get_id_all->implode("id", " ");

        $separated_data_title = explode(" ", $convert_name_title);


                                       $get_all_price =  DB::table('consigment_details')->whereIn('consigment_id',$separated_data_title)->get();

                                       $get_final_price = 0;

                                       foreach($get_all_price as $all_get_all_price){

                                        $get_first_price = ($all_get_all_price->price)*($all_get_all_price->quantity);


                                        $get_final_price = $get_final_price + $get_first_price;

                                       }


                                                      ?>



{{ $get_final_price }}


                                                    </td>

                                                </tr>
                                                @endforeach

                                            </tbody>
        </table>
    </div>

</div>
