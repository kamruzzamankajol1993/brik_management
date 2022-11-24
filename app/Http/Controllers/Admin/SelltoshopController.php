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
use App\Models\Otherconsigment;
use App\Models\Otherconsigmentdetail;
use App\Models\Vendor;
use App\Models\Selltoshop;
use App\Models\Selltoshopdetail;
class SelltoshopController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function create(){

        if (is_null($this->user) || !$this->user->can('sell_to_shop_add')) {
            return redirect('/admin/logout_session');
        }



        $Inventory_lists = Inventory::latest()->get();
        $client_lists = Vendor::latest()->get();
        $car_and_driver_lists = Caranddriver::latest()->get();

        return view('backend.sell_to_shop.create',compact('car_and_driver_lists','client_lists','Inventory_lists'));
    }


    public function get_assaign_product_to_vendor(Request $request){

        $other_consigment_ids = Otherconsigment::where('client_name',$request->main_value)->latest()->get();

        $convert_name_title = $other_consigment_ids->implode("id", " ");

        $separated_data_title = explode(" ", $convert_name_title);


        $consigment_main_detail = Otherconsigmentdetail::whereIn('consigment_id',$separated_data_title)->get();

        $data = view('backend.sell_to_shop.get_assaign_product_to_vendor',compact('consigment_main_detail'))->render();
        return response()->json($data);


    }
}
