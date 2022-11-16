<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use App\Models\Brand;
use App\Models\Inventoryname;
use App\Models\Inventory;
use App\Models\Productquantity;
class InventoryController extends Controller
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

        if (is_null($this->user) || !$this->user->can('inventory_name_view')) {
            return redirect('/admin/logout_session');
        }



        $inventory_names = Inventoryname::where('status',1)->latest()->get();
        $Inventory_lists = Inventory::latest()->get();



        return view('backend.inventory.index',compact('inventory_names','Inventory_lists'));
    }


    public function inventory_quantity(Request $request){

        $category_list = new Productquantity();
        $category_list->main_date = $request->main_date;
        $category_list->quantity = $request->quantity;
        $category_list->product_id = $request->id;
        $category_list->save();

        $catch_previous_value = Inventory::where('product_name',$request->id)
                                   ->value('quantity');

                                   $get_rr_on = $catch_previous_value+$request->quantity;

         $catch_previous_value45 = Inventory::where('product_name',$request->id)
         ->update([
            'quantity' => $get_rr_on
         ]);


    }


    public function store(Request $request){
        if (is_null($this->user) || !$this->user->can('inventory_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any data !');
        }
// dd(11);

        $category_list = new Inventory();
        $category_list->main_date = $request->main_date;
        $category_list->product_name = $request->product_name;
        $category_list->lot_number = $request->lot_number;
        $category_list->quantity = $request->quantity;
        $category_list->status = $request->status;
        $category_list->save();


        return redirect()->back()->with('success','Created Successfully');

    }


    public function update(Request $request){
        if (is_null($this->user) || !$this->user->can('inventory_update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any data !');
        }

        $category_list = Inventory::find($request->id);
        $category_list->main_date = $request->main_date;
        $category_list->product_name = $request->product_name;
        $category_list->lot_number = $request->lot_number;
        $category_list->quantity = $request->quantity;
        $category_list->status = $request->status;
        $category_list->save();


        return redirect()->back()->with('info','Updated Successfully');

    }

    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('inventory_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Inventory::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }

    public function inventory_quantity_delete($id){


        $get_quantity_all = Productquantity::where('id',$id)->value('quantity');


        $admins = Productquantity::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');


    }
}
