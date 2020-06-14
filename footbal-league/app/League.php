<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $fillable = ['league_name', 'created_at', 'updated_at'];

    public function club()
    {
        return $this->hasMany('App\club');
    }

    public function match()
    {
        return $this->hasMany('App\Match');
    }
}
