<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\GeneralExpense;
use App\GeneralExpTransaction;
use App\Http\Controllers\Controller;

class ExpanseController extends Controller
{
    public function index()
    {
        $table = GeneralExpense::all();
        return view('reports.genExpense.genExpense')->with(['table' => $table]);
    }
    public function show(Request $request){

        //dd($request->all());
        $date_rang = date_time_range($request->dateRang);
        $pre_table = GeneralExpTransaction::whereBetween('created_at', [$date_rang[0], $date_rang[1]]);
        if($request->filled('generalExpanseID')){
            $pre_table->where('generalExpanseID', $request->generalExpanseID);
        }
        $pre_table->where('transactionType', 'OUT');
        $table = $pre_table->get();

        return view('print.genExpense.genExpense')->with(['table' => $table, 'date_rang' =>  $request->dateRang]);
    }
}
