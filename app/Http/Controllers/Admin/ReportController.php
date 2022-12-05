<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consigment_detail;
use App\Models\Consignment;
use Carbon\Carbon;
use App\Models\Selltoshop;
use App\Models\Selltoshopdetail;
use App\Models\Otherconsigment;
use App\Models\Otherconsigmentdetail;
class ReportController extends Controller
{
    public function sell_report(){

        return view('backend.report.index');
    }


    public function brick_sell_report(){

        return view('backend.report.brick_sell_report');

    }

    public function other_sell_report(){
        return view('backend.report.other_sell_report');
    }


    public function client_report(){
        return view('backend.report.client_sell_report');
    }

    public function vendor_report(){
        return view('backend.report.vendor_sell_report');
    }


    public function get_search_data(Request $request){


        if($request->search_type == 'monthly'){

            $data = view('backend.report.monthly_search')->render();
            return response()->json($data);

        }elseif($request->search_type == 'yearly'){

            $data = view('backend.report.yearly_search')->render();
            return response()->json($data);

        }else{

            $data =  view('backend.report.datewise_search')->render();
            return response()->json($data);

        }

    }

    public function monthly_search_result_to_get_data(Request $request){

        $get_id_from_main = Consigment_detail::where('status',1)
        ->whereYear('created_at', '=', $request->year_name)
        ->whereMonth('created_at', '=', $request->month_name)->latest()->get();


        // $convert_name_title = $get_id_from_main->implode("id", " ");

        // $separated_data_title = explode(" ", $convert_name_title);

        $data =  view('backend.report.monthly_search_result_to_get_data',compact('get_id_from_main'))->render();
        return response()->json($data);



    }


    public function other_monthly_search_result_to_get_data(Request $request){

        $get_id_from_main = Selltoshopdetail::whereYear('created_at', '=', $request->year_name)
        ->whereMonth('created_at', '=', $request->month_name)->latest()->get();

        $data =  view('backend.report.other_monthly_search_result_to_get_data',compact('get_id_from_main'))->render();
        return response()->json($data);

    }


    public function yearly_search_result_to_get_data(Request $request){

        $get_id_from_main = Consigment_detail::where('status',1)
        ->whereYear('created_at', '=', $request->year_name)->latest()->get();


        // $convert_name_title = $get_id_from_main->implode("id", " ");

        // $separated_data_title = explode(" ", $convert_name_title);

        $data =  view('backend.report.yearly_search_result_to_get_data',compact('get_id_from_main'))->render();
        return response()->json($data);

    }

    public function other_yearly_search_result_to_get_data(Request $request){


        $get_id_from_main = Selltoshopdetail::whereYear('created_at', '=', $request->year_name)->latest()->get();

        $data =  view('backend.report.other_yearly_search_result_to_get_data',compact('get_id_from_main'))->render();
        return response()->json($data);

    }


    public function datewise_search_result_to_get_data(Request $request){

        $start_date_one = date("d/m/Y", strtotime($request->from_date));
        $end_date_one = date("d/m/Y", strtotime($request->to_date));

        $startDate = Carbon::createFromFormat('d/m/Y', $start_date_one);
        $endDate = Carbon::createFromFormat('d/m/Y', $end_date_one);


        $get_id_from_main = Consigment_detail::where('status',1)
        ->whereBetween('created_at', [$startDate, $endDate])->latest()->get();

        $data =  view('backend.report.datewise_search_result_to_get_data',compact('get_id_from_main'))->render();
        return response()->json($data);

    }


    public function other_datewise_search_result_to_get_data(Request $request){

        $start_date_one = date("d/m/Y", strtotime($request->from_date));
        $end_date_one = date("d/m/Y", strtotime($request->to_date));

        $startDate = Carbon::createFromFormat('d/m/Y', $start_date_one);
        $endDate = Carbon::createFromFormat('d/m/Y', $end_date_one);


        $get_id_from_main = Selltoshopdetail::where('status',1)
        ->whereBetween('created_at', [$startDate, $endDate])->latest()->get();

        $data =  view('backend.report.other_datewise_search_result_to_get_data',compact('get_id_from_main'))->render();
        return response()->json($data);

    }


    public function clientReport_monthly_search_result_to_get_data(Request $request){

        $year_name = $request->year_name;
        $month_name = $request->month_name;

        $get_id_from_main = Consignment::where('status',1)
        ->whereYear('created_at', '=', $request->year_name)
        ->whereMonth('created_at', '=', $request->month_name)->select('client_name')->distinct()->get();

        $data =  view('backend.report.clientReport_monthly_search_result_to_get_data',compact('month_name','year_name','get_id_from_main'))->render();
        return response()->json($data);

    }


    public function vendorReport_monthly_search_result_to_get_data(Request $request){

        $year_name = $request->year_name;
        $month_name = $request->month_name;

        $get_id_from_main = Selltoshop::whereYear('created_at', '=', $request->year_name)
        ->whereMonth('created_at', '=', $request->month_name)->select('name')->distinct()->get();

        $data =  view('backend.report.vendorReport_monthly_search_result_to_get_data',compact('month_name','year_name','get_id_from_main'))->render();
        return response()->json($data);

    }

    public function vendorReport_yearly_search_result_to_get_data(Request $request){

        $year_name = $request->year_name;


        $get_id_from_main = Selltoshop::whereYear('created_at', '=', $request->year_name)->select('name')->distinct()->get();

        $data =  view('backend.report.vendorReport_yearly_search_result_to_get_data',compact('year_name','get_id_from_main'))->render();
        return response()->json($data);

    }

    public function vendorReport_datewise_search_result_to_get_data(){
        $start_date_one = date("d/m/Y", strtotime($request->from_date));
        $end_date_one = date("d/m/Y", strtotime($request->to_date));

        $startDate = Carbon::createFromFormat('d/m/Y', $start_date_one);
        $endDate = Carbon::createFromFormat('d/m/Y', $end_date_one);


        $get_id_from_main = Selltoshop::whereBetween('created_at', [$startDate, $endDate])->select('name')->distinct()->get();


        $data =  view('backend.report.vendorReport_datewise_search_result_to_get_data',compact('endDate','startDate','get_id_from_main'))->render();
        return response()->json($data);

    }

    public function clientReport_yearly_search_result_to_get_data(Request $request){


        $year_name = $request->year_name;


        $get_id_from_main = Consignment::where('status',1)
        ->whereYear('created_at', '=', $request->year_name)->select('client_name')->distinct()->get();

        $data =  view('backend.report.clientReport_yearly_search_result_to_get_data',compact('year_name','get_id_from_main'))->render();
        return response()->json($data);

    }


    public function clientReport_datewise_search_result_to_get_data(request $request){


        $start_date_one = date("d/m/Y", strtotime($request->from_date));
        $end_date_one = date("d/m/Y", strtotime($request->to_date));

        $startDate = Carbon::createFromFormat('d/m/Y', $start_date_one);
        $endDate = Carbon::createFromFormat('d/m/Y', $end_date_one);


        $get_id_from_main = Consignment::where('status',1)
        ->whereBetween('created_at', [$startDate, $endDate])->select('client_name')->distinct()->get();


        $data =  view('backend.report.clientReport_datewise_search_result_to_get_data',compact('endDate','startDate','get_id_from_main'))->render();
        return response()->json($data);


    }
}
