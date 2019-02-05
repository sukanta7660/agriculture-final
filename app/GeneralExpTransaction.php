<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralExpTransaction extends Model
{
    protected $table = 'gen_exp_transaction';
    protected $primaryKey = 'generalExpanseTransactionID';
    protected $fillable = [
        'generalExpanseID', 'amountIN', 'amountOut', 'transactionType', 'descriptions'
    ];
    public function generalexp()
    {
        return $this->belongsTo('App\GeneralExpense', 'generalExpanseID');
    }
}
