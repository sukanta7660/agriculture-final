<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InExCat extends Model
{
    protected $table = 'inexp_cat';
    protected $primaryKey = 'inexpCatID';
    protected $fillable = [
        'name', 'projectID'
    ];
}
