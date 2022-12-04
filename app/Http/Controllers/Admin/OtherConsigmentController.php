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
class OtherConsigmentController extends Controller
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

        if (is_null($this->user) || !$this->user->can('other_consigment_add')) {
            return redirect('/admin/logout_session');
        }



        $Inventory_lists = Inventory::latest()->get();
        $client_lists = Vendor::latest()->get();
        $car_and_driver_lists = Caranddriver::latest()->get();

        return view('backend.other_consigment.create',compact('car_and_driver_lists','client_lists','Inventory_lists'));
    }


    public function index(){

        if (is_null($this->user) || !$this->user->can('other_consigment_view')) {
            return redirect('/admin/logout_session');
        }




        $client_lists = Vendor::latest()->get();
        $Inventory_lists = Inventory::latest()->get();

        $car_and_driver_lists = Caranddriver::latest()->get();

        $consigment_detail = Otherconsigment::latest()->get();

        return view('backend.other_consigment.index',compact('consigment_detail','car_and_driver_lists','client_lists','Inventory_lists'));
    }


    public function edit($id){

        if (is_null($this->user) || !$this->user->can('other_consigment_view')) {
            return redirect('/admin/logout_session');
        }




        $client_lists = Vendor::latest()->get();
        $Inventory_lists = Inventory::latest()->get();

        $car_and_driver_lists = Caranddriver::latest()->get();

        $consigment_detail = Otherconsigment::where('id',$id)->first();

        $consigment_main_detail = Otherconsigmentdetail::where('consigment_id',$id)->get();

        return view('backend.other_consigment.edit',compact('consigment_main_detail','consigment_detail','car_and_driver_lists','client_lists','Inventory_lists'));
    }


    public function return_quantity_other_consigment(Request $request){


        $catch_previous_value_first = Otherconsigmentdetail::where('client_name',$request->client_name)
        ->where('product_name',$request->product_name)
        ->value('quantity');

        $get_result_first = $catch_previous_value_first - $request->quantity;



        $catch_previous_value1_first =Otherconsigmentdetail::where('client_name',$request->client_name)
        ->where('product_name',$request->product_name)
->update([
'quantity' => $get_result_first
]);




        $catch_previous_value = Inventory::where('product_name',$request->product_name)
        ->value('quantity');
$get_result = $catch_previous_value + $request->quantity;




return redirect()->back()->with('success','Return Successfully');


    }


    public function get_vendor_name(Request $request){

        $client_lists = Vendor::where('name',$request->main_value)->latest()->get();

        $data = view('backend.other_consigment.get_client_name',compact('client_lists'))->render();
        return response()->json($data);
    }



    public function store(Request $request){


        $input = $request->all();


    $database_save = new Otherconsigment();
    $database_save->main_date = $request->main_date;
    $database_save->consignment_number = $request->consignment_number;
    $database_save->client_name = $request->client_name;
    $database_save->delivery_address = $request->delivery_address;
    $database_save->contact = $request->contact;
    $database_save->request_type = $request->request_type;
    $database_save->status = 0;
    $database_save->save();


    $invoice_id = $database_save->id;


    $condition_main_product_id = $input['main_product_id'];

        foreach($condition_main_product_id as $key => $condition_main_product_id){
            $form= new Otherconsigmentdetail();
            $form->product_name=$input['main_product_id'][$key];

            $form->quantity=$input['p_quantity'][$key];
            $form->price=$input['unit_price'][$key];
            $form->client_name = $request->client_name;
            $form->consigment_id =  $invoice_id;

            $form->save();

            //first table quantity update



    $catch_previous_value = Inventory::where('product_name',$input['main_product_id'][$key])
                                       ->value('quantity');
                $get_result = $catch_previous_value - $input['p_quantity'][$key];

                $catch_previous_value1 = Inventory::where('product_name',$input['main_product_id'][$key])
                ->update([
                    'quantity' => $get_result
                 ]);
            //end first table quantity ypdate


       }


       return redirect('admin/other_consigment/')->with('success','Created Successfully');

    }


    public function update(Request $request){


        $input = $request->all();


    $database_save =Otherconsigment::find($request->id);
    $database_save->main_date = $request->main_date;
    $database_save->consignment_number = $request->consignment_number;
    $database_save->client_name = $request->client_name;
    $database_save->delivery_address = $request->delivery_address;
    $database_save->contact = $request->contact;
    $database_save->request_type = $request->request_type;
    $database_save->status = 0;
    $database_save->save();

    $invoice_id = $database_save->id;


    $condition_main_product_id = $input['main_product_id'];
    Otherconsigmentdetail::where('consigment_id',$invoice_id)->delete();

    foreach($condition_main_product_id as $key => $condition_main_product_id){
        $form= new Otherconsigmentdetail();
        $form->product_name=$input['main_product_id'][$key];

        $form->quantity=$input['p_quantity'][$key];
        $form->price=$input['unit_price'][$key];
        $form->client_name = $request->client_name;
        $form->consigment_id =  $invoice_id;

        $form->save();

        //first table quantity update

        if(($input['main_product_id'][$key] == $input['p_p_id'][$key]) && ($input['p_quantity'][$key] == $input['d_quantity'][$key])){


        }else{



$catch_previous_value = Inventory::where('product_name',$input['main_product_id'][$key])
                                   ->value('quantity');
            $get_result = $catch_previous_value - $input['p_quantity'][$key];

            $catch_previous_value1 = Inventory::where('product_name',$input['main_product_id'][$key])
            ->update([
                'quantity' => $get_result
             ]);
        //end first table quantity ypdate
            }

   }


   return redirect('admin/other_consigment/')->with('success','Updated Successfully');
    }



    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('main_client_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Otherconsigment::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }
}
