<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{
    protected $fillable = ['club_id', 'league_id', 'MP', 'W', 'D', 'L', 'Pts', 'created_at', 'updated_at'];

    public function season()
    {
        return $this->belongsTo('App\Season');
    }

    public function league()
    {
        return $this->belongsTo('App\League');
    }

    public function club()
    {
        return $this->belongsTo('App\Club');
    }
}
