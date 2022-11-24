<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
class CategoryController extends Controller
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

        if (is_null($this->user) || !$this->user->can('category_view')) {
            return redirect('/admin/logout_session');
        }

        $category_list = Category::latest()->get();

        return view('backend.category.index',compact('category_list'));
    }


    public function store(Request $request){
        if (is_null($this->user) || !$this->user->can('category_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any data !');
        }



            $category_list = new Category();
            $category_list->main_date = date('Y-m-d');
            $category_list->cat_name = $request->cat_name;
            $category_list->status = $request->status;
            $category_list->save();








            return redirect()->back()->with('success','Created Successfully');

    }

    public function update(Request $request){
        if (is_null($this->user) || !$this->user->can('category_update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any data !');
        }
        $category_list = Category::find($request->id);
        $category_list->main_date = date('Y-m-d');
        $category_list->cat_name = $request->cat_name;
        $category_list->status = $request->status;
        $category_list->save();


        return redirect()->back()->with('info','Updated Successfully');

}

public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('category_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Category::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }


    public function category_type(Request $request){

        $cat_type = $request->cat_type;


        $data = view('backend.category.category_type',compact('cat_type'))->render();

       return response()->json($data);


    }

    public function sub_category_type(Request $request){

        return view('backend.category.sub_category_type');
    }
}
