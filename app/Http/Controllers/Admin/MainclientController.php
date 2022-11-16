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
use App\Models\Payment;
class MainclientController extends Controller
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

        if (is_null($this->user) || !$this->user->can('main_client_view')) {
            return redirect('/admin/logout_session');
        }




        $client_lists = Mainclient::latest()->get();

        return view('backend.main_client.index',compact('client_lists'));
    }


    public function store(Request $request){
        if (is_null($this->user) || !$this->user->can('main_client_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any data !');
        }
// dd(11);

        $category_list = new Mainclient();
        $category_list->name = $request->name;
        $category_list->main_date = $request->main_date;
        $category_list->address = $request->address;
        $category_list->email = $request->email;
        $category_list->phone = $request->phone;
        $category_list->status = $request->status;
        $category_list->save();


        return redirect()->back()->with('success','Created Successfully');

    }


    public function update(Request $request){
        if (is_null($this->user) || !$this->user->can('main_client_update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any data !');
        }

        $category_list = Mainclient::find($request->id);
        $category_list->name = $request->name;
        $category_list->main_date = $request->main_date;
        $category_list->address = $request->address;
        $category_list->email = $request->email;
        $category_list->phone = $request->phone;
        $category_list->status = $request->status;
        $category_list->save();


        return redirect()->back()->with('info','Updated Successfully');

    }

    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('main_client_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Mainclient::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }


    public function view($id){


        if (is_null($this->user) || !$this->user->can('main_client_view')) {
            return redirect('/admin/logout_session');
        }




        $client_lists = Mainclient::where('id',$id)->first();

        $payment_list = Payment::where('client_id',$id)->latest()->get();


        $payment_list_amount = Payment::where('client_id',$id)->sum('amount');


        $congisment_list = Consignment::where('client_name',$client_lists->name)
        ->where('status',1)->select('id')->get();


        $convert_name_title = $congisment_list->implode("id", " ");

        $separated_data_title = explode(" ", $convert_name_title);

        $consigment_main_detail = Consigment_detail::whereIn('consigment_id',$separated_data_title)
                                    ->get();


                                   // dd($consigment_main_detail);



                                    $total_price_list = 0;


                                    foreach($consigment_main_detail as $all_consigment_main_detail){



                                        $mm_price = $all_consigment_main_detail->price * $all_consigment_main_detail->quantity;

                $total_price_list = $total_price_list+$mm_price;

                                    }


                                   // dd($total_price_list);

        return view('backend.main_client.view',compact('consigment_main_detail','total_price_list','client_lists','payment_list','payment_list_amount'));


    }


    public function client_payment(Request $request){


        $category_list = new Payment();
        $category_list->client_id = $request->id;
        $category_list->main_date = $request->main_date;
        $category_list->amount = $request->amount;
         $category_list->save();


        return redirect()->back()->with('success','Created Successfully');



    }
}
