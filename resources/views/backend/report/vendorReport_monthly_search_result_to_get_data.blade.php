<div class="col-sm-12">

    <div class="table-responsive">
        <table class="table table-bordered dt-responsive nowrap"
        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                <th>SL</th>

                                        <th>Client Name</th>
                                        <th>Given Quantity</th>
                                        <th>Sell Quantity</th>




                                                </tr>

                                            </thead>
                                            <tbody>
                                                @foreach($get_id_from_main as $key=>$all_get_id_from_main)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $all_get_id_from_main->name }}</td>
                                                    <td>

                                                        <?php

$get_given_quantity = DB::table('otherconsigmentdetails')

->where('client_name',$all_get_id_from_main->name)->sum('quantity');


                                                        ?>

                                                        {{ $get_given_quantity }}


                                                    </td>
                                                    <td>

                                                      <?php
                                               $get_id_all = DB::table('selltoshops')

                                               ->where('name',$all_get_id_from_main->name)
                                               ->whereYear('created_at', '=', $year_name)
                                                ->whereMonth('created_at', '=', $month_name)
                                               ->get();


                                    $convert_name_title = $get_id_all->implode("id", " ");

        $separated_data_title = explode(" ", $convert_name_title);


                                       $get_all_price =  DB::table('selltoshopdetails')->whereIn('consigment_id',$separated_data_title)->sum('quantity');




                                                      ?>



{{ $get_all_price }}


                                                    </td>

                                                </tr>
                                                @endforeach

                                            </tbody>
        </table>
    </div>

</div>
