<?php

namespace App\Http\Controllers\Bank;

use App\BankTransaction;
use App\Banks;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BankTransacController extends Controller
{
    public function index(){
        $table = BankTransaction::orderBy('bankbookID', 'DESC')->get();
        $bankinfo = Banks::orderBy('bankID', 'DESC')->get();
        return view('bank.banktran')->with(['table' => $table, 'bankinfo'=>$bankinfo]);
    }
    public function deposit(Request $request)
    {
        $table = new BankTransaction();

        $table->bankID = $request->bankID;
        $table->amountIN = $request->amountIN;
        $table->transactionType = 'IN';
        $table->descriptions = $request->descriptions;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }

    public function withdraw(Request $request)
    {
        $table = new BankTransaction();

        $table->bankID = $request->bankID;
        $table->amountOut = $request->amountOut;
        $table->transactionType = 'OUT';
        $table->descriptions = $request->descriptions;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
}
