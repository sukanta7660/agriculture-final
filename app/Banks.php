<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    protected $table = 'banks';
    protected $primaryKey = 'bankID';
    protected $fillable = [
        'name', 'accountNo', 'branch', 'contactPerson', 'contact', 'balance'
    ];
}
