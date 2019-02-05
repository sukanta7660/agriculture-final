<?php

namespace App\Http\Controllers\Project;

use App\InExTransaction;
use App\InExCat;
use App\Projects;
use App\ProjectTransaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ExpanseController extends Controller
{
    public function index(){
        $table = InExTransaction::where('projectID', session('projectID'))->orderBy('inexpTransactionID', 'DESC')->get();
        $expcat = InExCat::where('projectID', session('projectID'))->orderBy('inexpCatID', 'DESC')->get();
        return view('projectExpense.projectExpTransaction')->with(['table'=>$table, 'expcat'=>$expcat]);
    }

    public function save(Request $request){
        DB::beginTransaction();
        try {

        if($request->amountOut > 0){
            $table = new InExTransaction();
            $table->inexpCatID = $request->inexpCatID;
            $table->amountOut = $request->amountOut;
            $table->descriptions = $request->descriptions;
            $table->projectID = session('projectID');
            $table->transactionType = 'OUT';
            $table->save();
            $inexpTransactionID = $table->inexpTransactionID;

            //**********Project********
            $project = Projects::find(session('projectID'));
            $old_blance = $project->balance;
            $new_blance = $old_blance - $request->amountOut;
            $project->balance = $new_blance;
            $project->save();
            //**********/Project********

            //**********Project Transaction********
            $p_transaction = new ProjectTransaction();
            $p_transaction->projectID = session('projectID');
            $p_transaction->amountOut = $request->amountOut;
            $p_transaction->transactionType = 'OUT';
            $p_transaction->descriptions = serialize(['sector'=>'Expanse', 'ref' => $inexpTransactionID, 'description' => $request->descriptions]);
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
            if($request->amountOut > 0){
        $table= InExTransaction::find($request->id);

        $pre_amount = $table->amountOut;
        $table->inexpCatID = $request->inexpCatID;
        $table->amountOut = $request->amountOut;
        $table->descriptions = $request->descriptions;
        $table->save();

        $projectID = $table->projectID;

        //**********Project Category********
        $project = Projects::find($projectID);
        $old_blance = $project->balance + $pre_amount;
        $new_blance = $old_blance - $request->amountOut;
        $project->balance = $new_blance;
        $project->save();
        //**********/Project Category********

        //**********Project Transaction********
        ProjectTransaction::where('projectID', $projectID)
            ->where('descriptions','like', '%sector%Expanse%ref%'.$request->id.'%')
            ->update([
                'amountOut' => $request->amountOut,
                'descriptions' => serialize(['sector'=>'Expanse', 'ref' => $request->id, 'description' => $request->descriptions])
            ]);
        //**********/Project Transaction********
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

        $table = InExTransaction::find($id);
        $pre_amount = $table->amountOut;
        $projectID = $table->projectID;
        $table->delete();

        //**********Project********
        $project = Projects::find($projectID);
        $old_blance = $project->balance;
        $new_blance = $old_blance + $pre_amount;
        $project->balance = $new_blance;
        $project->save();
        //**********/Project********

        //**********Project Transaction********
        ProjectTransaction::where('projectID', $projectID)
            ->where('descriptions','like', '%sector%Expanse%ref%'.$id.'%')
            ->delete();
        //**********/Project Transaction********

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->back()->with(config('custom.del'));
    }
}
