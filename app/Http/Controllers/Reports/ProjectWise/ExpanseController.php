<?php

namespace App\Http\Controllers\Reports\ProjectWise;

use Illuminate\Http\Request;
use App\InExCat;
use App\InExTransaction;
use App\Http\Controllers\Controller;

class ExpanseController extends Controller
{
    public function index()
    {
        $table = InExCat::where('projectID', session('projectID'))->get();
        return view('reports.projectWise.expenseReport')->with(['table' => $table]);
    }

    public function show(Request $request){

        //dd($request->all());
        $date_rang = date_time_range($request->dateRang);
        $pre_table = InExTransaction::where('projectID', session('projectID'))->whereBetween('created_at', [$date_rang[0], $date_rang[1]]);
        if($request->filled('inexpTransactionID')){
            $pre_table->where('inexpTransactionID', $request->inexpTransactionID);
        }
        $pre_table->where('transactionType', 'OUT');
        $table = $pre_table->get();

        return view('print.projectWise.expenseReports')->with(['table' => $table, 'date_rang' =>  $request->dateRang]);
    }
}
