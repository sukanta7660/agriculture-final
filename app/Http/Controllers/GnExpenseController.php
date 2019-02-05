<?php

namespace App\Http\Controllers;

use App\GeneralExpense;
use Illuminate\Http\Request;

class GnExpenseController extends Controller
{
    public function index(){
        $table =GeneralExpense::orderBy('generalExpanseID', 'DESC')->get();
        return view('expennse.gnexpense')->with([ 'table'=>$table]);
    }
    public function save(Request $request){
        $table = new GeneralExpense();
        $table->name = $request->name;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function edit(Request $request)
    {
        $table= GeneralExpense::find($request->id);
        $table->name = $request->name;
        $table->save();

        return redirect()->back()->with(config('custom.edit'));
    }

    public function del($id){
        $table = GeneralExpense::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }
}
