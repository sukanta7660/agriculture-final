<?php

namespace App\Http\Controllers\Project;

use App\Projects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index($id){
        $table = Projects::find($id);

        session([
            'projectID' => $table->projectID,
            'projectName' => $table->name
            ]);
        return view('projet');
    }


    public function complete($id){
        $table = Projects::find($id);
        return view('print.completeProject.fullProjectPrint')->with(['table' => $table]);
    }

}
