<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectSell extends Model
{
    protected $table = 'project_sell';
    protected $primaryKey = 'projectSellID';
    protected $fillable = [
        'descriptions', 'amount', 'projectID'
    ];
}
