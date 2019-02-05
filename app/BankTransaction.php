<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankTransaction extends Model
{
    protected $table = 'bankbook';
    protected $primaryKey = 'bankbookID';
    protected $fillable = [
        'bankID', 'amountIN', 'amountOut', 'transactionType', 'description'
    ];

    public function bank()
    {
        return $this->belongsTo('App\Banks', 'bankID');
    }
}
