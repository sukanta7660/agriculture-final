<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $table = User::orderBy('id','ASC')->get();
        return view('users.userlist')->with(['table'=>$table]);
    }
    public function save(Request $request){
        $table = new User();
        $table->name = $request->name;
        $table->email = $request->email;
        $table->userRoll = $request->userRoll;
        $table->password = bcrypt($request->password);
        $table->contact = $request->contact;
        $table->nid = $request->nid;
        $table->address = $request->address;
        $table->district = $request->district;
        $table->postcode = $request->postcode;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function edit(Request $request)
    {
        $table= User::find($request->id);
        $table->name = $request->name;
        $table->email = $request->email;
        $table->userRoll = $request->userRoll;
        $table->contact = $request->contact;
        $table->nid = $request->nid;
        $table->address = $request->address;
        $table->district = $request->district;
        $table->postcode = $request->postcode;
        $table->save();

        return redirect()->back()->with(config('custom.edit'));
    }
    public function del($id){
        $table = User::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }
}
