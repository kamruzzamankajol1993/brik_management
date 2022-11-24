<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use App\Models\Vendor;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class VendorController extends Controller
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

        if (is_null($this->user) || !$this->user->can('vendor_view')) {
            return redirect('/admin/logout_session');
        }

        $fixed_role_name = Role::where('name','vendor')->value('name');

        $vendor_lists = Vendor::latest()->get();

        return view('backend.vendor.index',compact('vendor_lists','fixed_role_name'));
    }


    public function store(Request $request){


        if (is_null($this->user) || !$this->user->can('vendor_add')) {
            return redirect('/admin/logout_session');
        }

        $request->validate([

            'email' => 'required|max:100|email|unique:vendors',

        ]);


           // Create New User
        $user = new Vendor();

        $user->role_name = $request->role_name;
        $user->main_date = $request->main_date;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->name = $request->name;
        $user->address = $request->address;
        $user->creator_id = Auth::guard('admin')->user()->id;
        $user->save();


        $employee_id = $user->id;


        $user_admin = new Admin();
        $user_admin->staff_id = $employee_id;
        $user_admin->name = $request->name;
        $user_admin->status = 1;

        $user_admin->email = $request->email;
        $user_admin->password = Hash::make(123456);
        $user_admin->save();

        if ($request->role_name) {
            $user_admin->assignRole($request->role_name);
        }

        $admin_table_id = $user_admin->id;


        $user_admin_all = new User();
        $user_admin_all->vendor_id = $employee_id;
        $user_admin_all->admin_id = $admin_table_id;

        $user_admin_all->name = $request->name;
        $user_admin_all->email = $request->email;
        $user_admin_all->password = Hash::make(123456);
        $user_admin_all->save();




        return redirect()->back()->with('success','Created successfully!');
}


public function update(Request $request){

  // Create New User
    $user = Vendor::find($request->id);
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->name = $request->name;
    $user->address = $request->address;
    $user->main_date = $request->main_date;
    $user->save();



    Admin::where('staff_id', $request->id)
       ->update([
           'name' => $request->name,
           'email' => $request->email

        ]);



        User::where('vendor_id', $request->id)
       ->update([
           'name' => $request->name,
           'email' => $request->email

        ]);






    return redirect()->back()->with('info','Updated successfully!');
}


public function delete($id){

    $user = Vendor::find($id);
   if (!is_null($user)) {
       $user->delete();
   }

   $user1 = Admin::where('staff_id',$id)->delete();

   $user13 = User::where('vendor_id',$id)->delete();

   return redirect()->back()->with('error','Deleted successfully!');
}
}
