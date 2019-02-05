<?php

namespace App\Http\Controllers\Asset;

use Illuminate\Http\Request;
use App\Assets;
use App\Http\Controllers\Controller;

class AssetController extends Controller
{
    public function index(){
        $table =Assets::orderBy('assetID', 'DESC')->get();
        return view('assets.assets')->with([ 'table'=>$table]);
    }
    public function save(Request $request){
        $table = new Assets();
        $table->name = $request->name;
        $table->amount = $request->amount;
        $table->description = $request->description;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function edit(Request $request)
    {
        $table= Assets::find($request->id);
        $table->name = $request->name;
        $table->amount = $request->amount;
        $table->description = $request->description;
        $table->save();

        return redirect()->back()->with(config('custom.edit'));
    }
    public function del($id){
        $table = Assets::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }
}
