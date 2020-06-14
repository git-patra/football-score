<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = ['home_club_id', 'away_club_id', 'score_home', 'score_away', 'league_id', 'season_id', 'created_at', 'updated_at'];


    public function season()
    {
        return $this->belongsTo('App\Season');
    }

    public function league()
    {
        return $this->belongsTo('App\League');
    }

    public function home()
    {
        return $this->belongsTo('App\Club', 'home_club_id');
    }
    public function away()
    {
        return $this->belongsTo('App\Club', 'away_club_id');
    }
}
