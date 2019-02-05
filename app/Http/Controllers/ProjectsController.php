<?php

namespace App\Http\Controllers;

use App\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(){
        $table = Projects::where('status','Running')->orderBy('projectID', 'DESC')->get();
        return view('project.projects')->with(['table' => $table]);
    }
    public function save(Request $request){
        $table = new Projects();
        $table->name = $request->name;
        $table->status = 'Running';
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function edit(Request $request)
    {
        $table= Projects::find($request->id);
        $table->name = $request->name;
        $table->save();

        return redirect()->back()->with(config('custom.edit'));
    }
    public function del($id){
        $table = Projects::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }

    //Complete Project

    public function completed_project(){
        $table = Projects::where('status','Completed')->get();

        return view('project.completeProject')->with(['table'=>$table]);
    }

    public function complete(Request $request){
        $table= Projects::find($request->id);
        $table->status = 'Completed';
        $table->ending = date('Y-m-d');
        $table->save();

        return redirect()->back()->with(config('custom.success'));
    }


    //Complete Project

}
