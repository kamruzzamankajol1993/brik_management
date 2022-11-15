<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mainclient;
use Illuminate\Support\Str;
use DB;
use App\Models\Brand;
use App\Models\Inventoryname;
use App\Models\Inventory;
use App\Models\Caranddriver;
use App\Models\Consigment_detail;
use App\Models\Consignment;
class DashboardController extends Controller
{
	public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function index(){
if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            // abort(403, 'Sorry !! You are Unauthorized to view dashboard !');

            return redirect('/admin/logout_session');
        }

        $total_briks = Inventory::sum('quantity');

        $total_delivery = Consignment::where('status',1)->count();

        $alert_inventory = Inventory::where('quantity','<',50)->count();

        $consigment_amount = Consignment::where('status',1)->select('id')->get();

        $convert_name_title = $consigment_amount->implode("id", " ");

        $separated_data_title = explode(" ", $convert_name_title);

        $consigment_main_detail = Consigment_detail::whereIn('consigment_id',$separated_data_title)
                                    ->get();


                                    $total_price_list = 0;


                    foreach($consigment_main_detail as $all_consigment_main_detail){



                        $mm_price = $all_consigment_main_detail->price * $all_consigment_main_detail->quantity;

$total_price_list = $total_price_list+$mm_price;

                    }




                                    $consigment_detail = Consignment::whereIn('status',[0])->latest()->get();

    	return view('backend.index',compact('total_price_list','consigment_detail','total_briks','total_delivery','alert_inventory','consigment_main_detail'));
    }
}
