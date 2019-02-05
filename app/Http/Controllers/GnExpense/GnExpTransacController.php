<?php

namespace App\Http\Controllers\GnExpense;

use App\GeneralExpTransaction;
use App\GeneralExpense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GnExpTransacController extends Controller
{
    public function index(){
        $table = GeneralExpTransaction::orderBy('generalExpanseTransactionID', 'DESC')->get();
        $expcat = GeneralExpense::orderBy('generalExpanseID', 'DESC')->get();
        return view('expennse.expensetransaction')->with(['table' => $table,'expcat'=>$expcat]);
    }
    public function save(Request $request)
    {

            $table = new GeneralExpTransaction();

            $table->generalExpanseID = $request->generalExpanseID;
            $table->amountOut = $request->amountOut;
            $table->descriptions = $request->descriptions;
            $table->save();

            return redirect()->back()->with(config('custom.save'));
    }
    public function edit(Request $request)
    {

            $table= GeneralExpTransaction::find($request->id);

            $table->generalExpanseID = $request->generalExpanseID;
            $table->amountOut = $request->amountOut;
            $table->descriptions = $request->descriptions;
            $table->save();

            return redirect()->back()->with(config('custom.edit'));
    }
    public function del($id){
        $table = GeneralExpTransaction::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }
}
