<?php

namespace App\Http\Controllers\Bank;

use App\Banks;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BankIinfoController extends Controller
{
    public function index(){
        $table = Banks::orderBy('bankID', 'DESC')->get();
        return view('bank.bankInfo')->with(['table' => $table]);
    }
    public function save(Request $request){
        $table = new Banks();
        $table->name = $request->name;
        $table->accountNo = $request->accountNo;
        $table->branch = $request->branch;
        $table->contactPerson = $request->contactPerson;
        $table->contact = $request->contact;
        $table->balance = $request->balance;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function edit(Request $request)
    {
        $table= Banks::find($request->id);
        $table->name = $request->name;
        $table->accountNo = $request->accountNo;
        $table->branch = $request->branch;
        $table->contactPerson = $request->contactPerson;
        $table->contact = $request->contact;
        $table->balance = $request->balance;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function del($id){
        $table = Banks::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }
}
