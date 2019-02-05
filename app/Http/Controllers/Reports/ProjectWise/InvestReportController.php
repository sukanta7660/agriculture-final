<?php

namespace App\Http\Controllers\Reports\ProjectWise;

use Illuminate\Http\Request;
use App\Investment;
use App\Http\Controllers\Controller;

class InvestReportController extends Controller
{
    public function index()
    {
        $table = Investment::where('projectID', session('projectID'));
        return view('reports.projectWise.investReport')->with(['table' => $table]);
    }

    public function show(Request $request){

        //dd($request->all());
        $date_rang = date_time_range($request->dateRang);
        $pre_table = Investment::where('projectID', session('projectID'))->whereBetween('created_at', [$date_rang[0], $date_rang[1]]);
        if($request->filled('investmentID')){
            $pre_table->where('investmentID', $request->investmentID);
        }
        $table = $pre_table->get();

        return view('print.projectWise.investReport')->with(['table' => $table, 'date_rang' =>  $request->dateRang]);
    }
}
