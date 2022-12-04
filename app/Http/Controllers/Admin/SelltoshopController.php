<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mainclient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use PDF;
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


    public function index(){

        if (is_null($this->user) || !$this->user->can('sell_to_shop_view')) {
            return redirect('/admin/logout_session');
        }




        $client_lists = Vendor::latest()->get();
        $Inventory_lists = Inventory::latest()->get();

        $car_and_driver_lists = Caranddriver::latest()->get();

        $get_role_id = DB::table('model_has_roles')
                    ->where('model_id',Auth::guard('admin')->user()->id)->value('role_id');

                    if($get_role_id == 1){

        $consigment_detail = Selltoshop::latest()->get();
                    }else{
                        $consigment_detail = Selltoshop::where('name',Auth::guard('admin')->user()->name)->latest()->get();

                    }

        return view('backend.sell_to_shop.index',compact('consigment_detail','car_and_driver_lists','client_lists','Inventory_lists'));
    }


    public function edit($id){

        if (is_null($this->user) || !$this->user->can('sell_to_shop_view')) {
            return redirect('/admin/logout_session');
        }


        $consigment_detail = Selltoshop::where('id',$id)->first();

        $client_lists = Vendor::latest()->get();
        $Inventory_lists = Otherconsigmentdetail::where('client_name',$consigment_detail->name)->latest()->get();

        $car_and_driver_lists = Caranddriver::latest()->get();



        $consigment_main_detail = Selltoshopdetail::where('consigment_id',$id)->get();



        return view('backend.sell_to_shop.edit',compact('consigment_main_detail','consigment_detail','car_and_driver_lists','client_lists','Inventory_lists'));
    }


    public function view($id){

        if (is_null($this->user) || !$this->user->can('sell_to_shop_view')) {
            return redirect('/admin/logout_session');
        }


        $consigment_detail = Selltoshop::where('id',$id)->first();

        $client_lists = Vendor::latest()->get();
        $Inventory_lists = Otherconsigmentdetail::where('client_name',$consigment_detail->name)->latest()->get();

        $car_and_driver_lists = Caranddriver::latest()->get();



        $consigment_main_detail = Selltoshopdetail::where('consigment_id',$id)->get();



        return view('backend.sell_to_shop.view',compact('consigment_main_detail','consigment_detail','car_and_driver_lists','client_lists','Inventory_lists'));
    }


    public function print($id){

        if (is_null($this->user) || !$this->user->can('sell_to_shop_view')) {
            return redirect('/admin/logout_session');
        }


        $consigment_detail = Selltoshop::where('id',$id)->first();

        $client_lists = Vendor::latest()->get();
        $Inventory_lists = Otherconsigmentdetail::where('client_name',$consigment_detail->name)->latest()->get();

        $car_and_driver_lists = Caranddriver::latest()->get();



        $consigment_main_detail = Selltoshopdetail::where('consigment_id',$id)->get();


        $file_Name_Custome = 'Invoice_main';


        $pdf=PDF::loadView('backend.sell_to_shop.print',['consigment_main_detail'=>$consigment_main_detail,'consigment_detail'=>$consigment_detail,'car_and_driver_lists'=>$car_and_driver_lists,'client_lists'=>$client_lists,'Inventory_lists'=>$Inventory_lists],[],['format' => [75, 100]]);
    return $pdf->stream($file_Name_Custome.''.'.pdf');




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


    public function store(Request $request){


        $input = $request->all();


    $database_save = new Selltoshop();
    $database_save->main_date = $request->main_date;
    $database_save->consignment_number = $request->consignment_number;
    $database_save->name = $request->client_name;
    $database_save->delivery_address = $request->delivery_address;
    $database_save->contact = $request->contact;
    $database_save->shop_name = $request->shop_name;
    $database_save->status = 0;
    $database_save->save();


    $invoice_id = $database_save->id;


    $condition_main_product_id = $input['main_product_id'];

        foreach($condition_main_product_id as $key => $condition_main_product_id){
            $form= new Selltoshopdetail();
            $form->product_name=$input['main_product_id'][$key];

            $form->quantity=$input['p_quantity'][$key];


            $form->consigment_id =  $invoice_id;

            $form->save();

            //first table quantity update



    $catch_previous_value = Otherconsigmentdetail::where('client_name',$request->client_name)
    ->where('product_name',$input['main_product_id'][$key])
                                       ->value('quantity');
                $get_result = $catch_previous_value - $input['p_quantity'][$key];

                $catch_previous_value1 = Otherconsigmentdetail::where('client_name',$request->client_name)
                ->where('product_name',$input['main_product_id'][$key])
                ->update([
                    'quantity' => $get_result
                 ]);
            //end first table quantity ypdate


       }


       return redirect('admin/sell_to_shop/view/'.$invoice_id)->with('success','Created Successfully');

    }


    public function update(Request $request){


        $input = $request->all();


    $database_save =Selltoshop::find($request->id);
    $database_save->main_date = $request->main_date;
    $database_save->consignment_number = $request->consignment_number;
    $database_save->name = $request->client_name;
    $database_save->delivery_address = $request->delivery_address;
    $database_save->contact = $request->contact;
    $database_save->shop_name = $request->shop_name;
    $database_save->status = 0;
    $database_save->save();

    $invoice_id = $database_save->id;


    $condition_main_product_id = $input['main_product_id'];
    Selltoshopdetail::where('consigment_id',$invoice_id)->delete();

    foreach($condition_main_product_id as $key => $condition_main_product_id){
        $form= new Selltoshopdetail();
        $form->product_name=$input['main_product_id'][$key];

            $form->quantity=$input['p_quantity'][$key];


            $form->consigment_id =  $invoice_id;

        $form->save();

        //first table quantity update

        if(($input['main_product_id'][$key] == $input['p_p_id'][$key]) && ($input['p_quantity'][$key] == $input['d_quantity'][$key])){


        }else{



$catch_previous_value = Otherconsigmentdetail::where('client_name',$request->client_name)->where('product_name',$input['main_product_id'][$key])
                                   ->value('quantity');
            $get_result = $catch_previous_value - $input['p_quantity'][$key];

            $catch_previous_value1 = Otherconsigmentdetail::where('client_name',$request->client_name)->where('product_name',$input['main_product_id'][$key])
            ->update([
                'quantity' => $get_result
             ]);
        //end first table quantity ypdate
            }

   }


   return redirect('admin/sell_to_shop/view'.$invoice_id)->with('success','Updated Successfully');
    }



    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('main_client_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Selltoshop::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }
}
