<?php

namespace App\Http\Controllers\Project;

use App\Investment;
use App\Projects;
use App\ProjectTransaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class InvestController extends Controller
{
    public function index(){
        $table = Investment::where('projectID', session('projectID'))->orderBy('investmentID', 'DESC')->get();

        return view('projectExpense.investment')->with(['table'=>$table]);
    }
    public function save(Request $request){
        DB::beginTransaction();
        try {
            if($request->amount > 0) {
                $table = new Investment();
                $table->amount = $request->amount;
                $table->description = $request->description;
                $table->projectID = session('projectID');
                $table->save();
                $investmentID = $table->investmentID;

                //**********Project********
                $project = Projects::find(session('projectID'));
                $old_blance = $project->balance;
                $new_blance = $old_blance + $request->amount;
                $project->balance = $new_blance;
                $project->save();
                //**********/Project********

                //**********Project Transaction********
                $p_transaction = new ProjectTransaction();
                $p_transaction->projectID = session('projectID');
                $p_transaction->amountIN = $request->amount;
                $p_transaction->transactionType = 'IN';
                $p_transaction->descriptions = serialize(['sector' => 'Investment', 'ref' => $investmentID, 'description' => $request->description]);
                $p_transaction->save();
                //**********/Project Transaction********
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->back()->with(config('custom.save'));
    }
    public function edit(Request $request)
    {
        DB::beginTransaction();
        try {
            if($request->amount > 0) {
                $table = Investment::find($request->id);
                $pre_amount = $table->amount;
                $table->amount = $request->amount;
                $table->description = $request->description;
                $table->save();


                $projectID = $table->projectID;

                //**********Project********
                $project = Projects::find($projectID);
                $old_blance = $project->balance;
                $new_blance = $old_blance - $pre_amount + $request->amount;
                $project->balance = $new_blance;
                $project->save();
                //**********/Project********

                //**********Project Investment********
                ProjectTransaction::where('projectID', $projectID)
                    ->where('descriptions','like', '%sector%Investment%ref%'.$request->id.'%')
                    ->update([
                        'amountIN' => $request->amount,
                        'descriptions' => serialize(['sector'=>'Investment', 'ref' => $request->id, 'descriptions' => $request->description])
                    ]);
                //**********/Project Investment********


            }
                DB::commit();
            } catch (\Throwable $e) {
                DB::rollback();
                throw $e;
            }

        return redirect()->back()->with(config('custom.edit'));
    }
    public function del($id){

        DB::beginTransaction();
        try {

        $table = Investment::find($id);
        $pre_amount = $table->amount;
        $projectID = $table->projectID;
        $table->delete();

        //**********Project********
        $project = Projects::find($projectID);
        $old_blance = $project->balance;
        $new_blance = $old_blance - $pre_amount;
        $project->balance = $new_blance;
        $project->save();
        //**********/Project********

        //**********Project Transaction********
        ProjectTransaction::where('projectID', $projectID)
            ->where('descriptions','like', '%sector%Investment%ref%'.$id.'%')
            ->delete();
        //**********/Project Investment********

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
        return redirect()->back()->with(config('custom.del'));
    }
}
