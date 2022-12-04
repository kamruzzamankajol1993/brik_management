<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function sell_report(){

        return view('backend.report.index');
    }


    public function brick_sell_report(){

        return view('backend.report.brick_sell_report');

    }


    public function get_search_data(Request $request){

    }
}
