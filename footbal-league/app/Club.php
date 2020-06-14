<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = ['club_name', 'league_id', 'created_at', 'updated_at'];

    public function league()
    {
        return $this->belongsTo('App\League');
    }
}
