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
class CardriverController extends Controller
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

        if (is_null($this->user) || !$this->user->can('car_and_driver_view')) {
            return redirect('/admin/logout_session');
        }




        $car_and_driver_lists = Caranddriver::latest()->get();

        return view('backend.car_and_driver.index',compact('car_and_driver_lists'));
    }


    public function store(Request $request){
        if (is_null($this->user) || !$this->user->can('car_and_driver_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any data !');
        }
// dd(11);

        $category_list = new Caranddriver();
        $category_list->driver_name = $request->driver_name;
        $category_list->main_date = $request->main_date;
        $category_list->car_number = $request->car_number;
        $category_list->contact_no = $request->contact_no;
        $category_list->status = $request->status;
        $category_list->save();


        return redirect()->back()->with('success','Created Successfully');

    }


    public function update(Request $request){
        if (is_null($this->user) || !$this->user->can('car_and_driver_update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any data !');
        }

        $category_list = Caranddriver::find($request->id);
        $category_list->driver_name = $request->driver_name;
        $category_list->main_date = $request->main_date;
        $category_list->car_number = $request->car_number;
        $category_list->contact_no = $request->contact_no;
        $category_list->status = $request->status;
        $category_list->save();


        return redirect()->back()->with('info','Updated Successfully');

    }

    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('car_and_driver_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Caranddriver::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }


    public function view($id){


        if (is_null($this->user) || !$this->user->can('car_and_driver_view')) {
            return redirect('/admin/logout_session');
        }




        $car_and_driver_lists = Caranddriver::where('id',$id)->first();

        return view('backend.car_and_driver.view',compact('car_and_driver_lists'));


    }
}
