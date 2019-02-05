<?php

namespace App\Http\Controllers\Project;

use App\ProjectSell;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellController extends Controller
{
    public function index(){
        $table = ProjectSell::where('projectID', session('projectID'))->orderBy('projectSellID', 'DESC')->get();

        return view('projectExpense.projectSell')->with(['table'=>$table]);
    }
    public function save(Request $request){
        $table = new ProjectSell();

        $table->amount = $request->amount;
        $table->descriptions = $request->descriptions;
        $table->projectID = session('projectID');
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function edit(Request $request)
    {
        $table= ProjectSell::find($request->id);

        $table->amount = $request->amount;
        $table->descriptions = $request->descriptions;
        $table->save();

        return redirect()->back()->with(config('custom.edit'));
    }
    public function del($id){
        $table = ProjectSell::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }
}
