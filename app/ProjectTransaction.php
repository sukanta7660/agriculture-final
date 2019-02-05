<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTransaction extends Model
{
    protected $table = 'project_transaction';
    protected $primaryKey = 'projectTransactionID';
    protected $fillable = [
        'projectID', 'amountIN', 'amountOut', 'transactionType', 'descriptions'
    ];
}
