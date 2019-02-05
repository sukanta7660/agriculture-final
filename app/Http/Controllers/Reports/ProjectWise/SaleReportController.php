<?php

namespace App\Http\Controllers\Reports\ProjectWise;

use Illuminate\Http\Request;
use App\ProjectSell;
use App\Http\Controllers\Controller;

class SaleReportController extends Controller
{
    public function index()
    {
        $table = ProjectSell::where('projectID', session('projectID'));
        return view('reports.projectWise.saleReport')->with(['table' => $table]);
    }
    public function show(Request $request){

        //dd($request->all());
        $date_rang = date_time_range($request->dateRang);
        $pre_table = ProjectSell::where('projectID', session('projectID'))->whereBetween('created_at', [$date_rang[0], $date_rang[1]]);
        if($request->filled('projectSellID')){
            $pre_table->where('projectSellID', $request->projectSellID);
        }
        $table = $pre_table->get();

        return view('print.projectWise.saleReport')->with(['table' => $table, 'date_rang' =>  $request->dateRang]);
    }
}
