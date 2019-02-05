<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    protected $table = 'asset';
    protected $primaryKey = 'assetID';
    protected $fillable = [
        'name', 'description', 'amount', 'decrease', 'increase'
    ];
}
