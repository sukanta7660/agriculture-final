<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'projectID';
    protected $fillable = [
        'name', 'balance', 'status', 'ending'
    ];

    public function investment(){
        return $this->hasMany('App\Investment', 'projectID');
    }

    public function sell(){
        return $this->hasMany('App\ProjectSell', 'projectID');
    }

    public function expanse(){
        return $this->hasMany('App\InExTransaction', 'projectID');
    }
}
