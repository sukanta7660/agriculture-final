<?php

namespace App\Http\Controllers\Reports\ProjectWise;

use Illuminate\Http\Request;
use App\ProjectSell;
use App\InExTransaction;
use App\Http\Controllers\Controller;

class ProfitReportController extends Controller
{
    public function index()
    {
        $table = ProjectSell::where('projectID', session('projectID'));
        return view('reports.projectWise.profitReport')->with(['table' => $table]);
    }

    public function profit_lose(Request $request){

        $dateRang = date('01/m/Y', strtotime($request->dateRang)).' - '.date('t/m/Y', strtotime($request->dateRang));
        $date_rang = date_time_range($dateRang);


        $all_income = ProjectSell::where('projectID', session('projectID'))->whereBetween('created_at', [$date_rang[0], $date_rang[1]])->sum('amount');

        $all_expanse = InExTransaction::where('projectID', session('projectID'))->whereBetween('created_at', [$date_rang[0], $date_rang[1]])->sum('amountOut');


        return view('print.projectWise.profitReports')->with([ 'months' => $request->dateRang, 'all_income' => $all_income, 'all_expanse' => $all_expanse]);
    }
}
