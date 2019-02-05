<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralExpense extends Model
{
    protected $table = 'general_expanse';
    protected $primaryKey = 'generalExpanseID';
    protected $fillable = [
        'name'
    ];
}
