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
class ConsigmentController extends Controller
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

        if (is_null($this->user) || !$this->user->can('consigment_add')) {
            return redirect('/admin/logout_session');
        }



        $Inventory_lists = Inventory::latest()->get();
        $client_lists = Mainclient::latest()->get();
        $car_and_driver_lists = Caranddriver::latest()->get();

        return view('backend.consigment.create',compact('car_and_driver_lists','client_lists','Inventory_lists'));
    }


    public function index(){

        if (is_null($this->user) || !$this->user->can('consigment_view')) {
            return redirect('/admin/logout_session');
        }




        $client_lists = Mainclient::latest()->get();
        $Inventory_lists = Inventory::latest()->get();

        $car_and_driver_lists = Caranddriver::latest()->get();

        $consigment_detail = Consignment::latest()->get();

        return view('backend.consigment.index',compact('consigment_detail','car_and_driver_lists','client_lists','Inventory_lists'));
    }


    public function edit($id){

        if (is_null($this->user) || !$this->user->can('consigment_view')) {
            return redirect('/admin/logout_session');
        }




        $client_lists = Mainclient::latest()->get();
        $Inventory_lists = Inventory::latest()->get();

        $car_and_driver_lists = Caranddriver::latest()->get();

        $consigment_detail = Consignment::where('id',$id)->first();

        $consigment_main_detail = Consigment_detail::where('consigment_id',$id)->get();

        return view('backend.consigment.edit',compact('consigment_main_detail','consigment_detail','car_and_driver_lists','client_lists','Inventory_lists'));
    }


    public function get_client_name(Request $request){

        $client_lists = Mainclient::where('name',$request->main_value)->latest()->get();

        $data = view('backend.consigment.get_client_name',compact('client_lists'))->render();
        return response()->json($data);
    }


    public function get_truck_name(Request $request){

        $client_lists = Caranddriver::where('car_number',$request->main_value)->latest()->get();

        $data = view('backend.consigment.get_truck_name',compact('client_lists'))->render();
        return response()->json($data);
    }



    public function store(Request $request){


        $input = $request->all();


    $database_save = new Consignment();
    $database_save->main_date = $request->main_date;
    $database_save->consignment_number = $request->consignment_number;
    $database_save->client_name = $request->client_name;
    $database_save->delivery_address = $request->delivery_address;
    $database_save->contact = $request->contact;
    $database_save->select_truck = $request->select_truck;
    $database_save->driver_name = $request->driver_name;
    $database_save->driver_contact = $request->driver_contact;
    $database_save->request_type = $request->request_type;
    $database_save->status = 0;
    $database_save->save();


    $invoice_id = $database_save->id;


    $condition_main_product_id = $input['main_product_id'];

        foreach($condition_main_product_id as $key => $condition_main_product_id){
            $form= new Consigment_detail();
            $form->product_name=$input['main_product_id'][$key];

            $form->quantity=$input['p_quantity'][$key];
            $form->price=$input['unit_price'][$key];

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


       return redirect('admin/release_product/')->with('success','Created Successfully');

    }


    public function update(Request $request){


        $input = $request->all();


    $database_save =Consignment::find($request->id);
    $database_save->main_date = $request->main_date;
    $database_save->consignment_number = $request->consignment_number;
    $database_save->client_name = $request->client_name;
    $database_save->delivery_address = $request->delivery_address;
    $database_save->contact = $request->contact;
    $database_save->select_truck = $request->select_truck;
    $database_save->driver_name = $request->driver_name;
    $database_save->driver_contact = $request->driver_contact;
    $database_save->request_type = $request->request_type;
    $database_save->status = 0;
    $database_save->save();

    $invoice_id = $database_save->id;


    $condition_main_product_id = $input['main_product_id'];
    Consigment_detail::where('consigment_id',$invoice_id)->delete();

    foreach($condition_main_product_id as $key => $condition_main_product_id){
        $form= new Consigment_detail();
        $form->product_name=$input['main_product_id'][$key];

        $form->quantity=$input['p_quantity'][$key];
        $form->price=$input['unit_price'][$key];

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


   return redirect('admin/consigment/')->with('success','Created Successfully');
    }



    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('main_client_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Consignment::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }
}
