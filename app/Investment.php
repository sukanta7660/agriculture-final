<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    protected $table = 'investment';
    protected $primaryKey = 'investmentID';
    protected $fillable = [
        'amount', 'description', 'projectID'
    ];
}
