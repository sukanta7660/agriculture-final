<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InExTransaction extends Model
{
    protected $table = 'inexp_transaction';
    protected $primaryKey = 'inexpTransactionID';
    protected $fillable = [
        'inexpCatID', 'amountIN', 'amountOut', 'transactionType', 'descriptions', 'projectID'
    ];

    public function inexcat(){
        return $this->belongsTo('App\InExCat', 'inexpCatID');
    }
}
