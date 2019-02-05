<?php

namespace App\Http\Controllers\Project;

use App\InExCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpCategoryController extends Controller
{
    public function index(){
        $table = InExCat::where('projectID', session('projectID'))->orderBy('inexpCatID', 'DESC')->get();

        return view('projectExpense.projectExpenseCat')->with(['table'=>$table]);
    }
    public function save(Request $request){
        $table = new InExCat();
        $table->name = $request->name;
        $table->projectID = session('projectID');
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function edit(Request $request)
    {

        $table= InExCat::find($request->id);
        $table->name = $request->name;
        $table->save();

        return redirect()->back()->with(config('custom.edit'));
    }
    public function del($id){
        $table = InExCat::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }
}
