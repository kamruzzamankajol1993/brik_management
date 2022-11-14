<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use App\Models\Brand;
use App\Models\Inventoryname;
class InventorynameController extends Controller
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



        $inventory_names = Inventoryname::latest()->get();

        return view('backend.inventory_name.index',compact('inventory_names'));
    }


    public function store(Request $request){
        if (is_null($this->user) || !$this->user->can('inventory_name_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any data !');
        }
// dd(11);

        $category_list = new Inventoryname();
        $category_list->main_date = $request->main_date;
        $category_list->product_name = $request->product_name;
        $category_list->alert_name = $request->alert_name;
        $category_list->status = $request->status;
        $category_list->save();


        return redirect()->back()->with('success','Created Successfully');

    }


    public function update(Request $request){
        if (is_null($this->user) || !$this->user->can('inventory_name_update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any data !');
        }

        $category_list = Inventoryname::find($request->id);
        $category_list->main_date = $request->main_date;
        $category_list->product_name = $request->product_name;
        $category_list->alert_name = $request->alert_name;
        $category_list->status = $request->status;

        $category_list->save();


        return redirect()->back()->with('info','Updated Successfully');

    }

    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('inventory_name_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Inventoryname::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }
}
