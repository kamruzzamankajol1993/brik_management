<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mainclient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use App\Models\Brand;
use App\Models\Inventoryname;
use App\Models\Inventory;
use App\Models\Caranddriver;
use App\Models\Consigment_detail;
use App\Models\Consignment;

class ReleaseController extends Controller
{
    public function index(){






        $client_lists = Mainclient::latest()->get();
        $Inventory_lists = Inventory::latest()->get();

        $car_and_driver_lists = Caranddriver::latest()->get();

        $consigment_detail = Consignment::whereIn('status',[0])->latest()->get();

        return view('backend.release_product.index',compact('consigment_detail','car_and_driver_lists','client_lists','Inventory_lists'));
    }


    public function update(Request $request){


         $database_save =Consignment::find($request->id);
         $database_save->rmain_date = $request->rmain_date;
         $database_save->status = $request->status;
         $database_save->save();

         if($request->status == 2){

            $consigment_main_detail = Consigment_detail::where('consigment_id',$request->id)->get();

            foreach($consigment_main_detail as $all_consigment_main_detail){


                $catch_previous_value = Inventory::where('product_name',$all_consigment_main_detail->product_name)
                                       ->value('quantity');


                                       $get_result = $catch_previous_value + $all_consigment_main_detail->quantity;

                $catch_previous_value1 = Inventory::where('product_name',$all_consigment_main_detail->product_name)
                ->update([
                    'quantity' => $get_result
                 ]);




            }


         }


    return redirect()->back()->with('info','Updated Successfully');
    }
}
