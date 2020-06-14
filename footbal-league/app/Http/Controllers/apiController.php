<?php

namespace App\Http\Controllers;

//* Resource for Json */
use App\Http\Resources\League as LeagueResource;
use App\Http\Resources\Club as ClubResource;
use App\Http\Resources\Match as MatchResource;
use App\Http\Resources\Standing as StandingResource;

//* Model */
use App\League;
use App\Club;
use App\Match;
use App\Standing;

use Illuminate\Http\Request;

class apiController extends Controller
{
    //* League */
    public function league()
    {
        return LeagueResource::collection(League::all());
    }

    public function storeLeague(Request $request)
    {
        $leagueExist = League::where('league_name', $request->leagueName)->first();

        if ($leagueExist) {
            return redirect('/sorry');
        } else {
            $name = $request->leagueName;

            League::create([
                'league_name' => $name,
                'created_at' => now()
            ]);

            return redirect('/');
        }
    }

    //* Club */
    public function club()
    {
        return ClubResource::collection(Club::all());
    }

    public function storeClub(Request $request)
    {
        $clubExist = Club::where('club_name', $request->clubName)->first();

        if ($clubExist) {
            return redirect('/sorry');
        } else {
            $name = $request->clubName;
            $league = $request->league;
            $nol = 0;

            Club::create([
                'club_name' => $name,
                'league_id' => $league,
                'MP' => $nol,
                'W' => $nol,
                'D' => $nol,
                'L' => $nol,
                'Pts' => $nol,
                'created_at' => now()
            ]);

            $clubInsert = Club::where('club_name', $name)->first();

            Standing::create([
                'club_id' => $clubInsert->id,
                'league_id' => $league,
                'created_at' => now()
            ]);

            return redirect('/');
        }
    }

    //* Matches */
    public function match()
    {
        return MatchResource::collection(Match::with('home')->with('away')->get());
    }

    public function storeMatch(Request $request, $ui)
    {
        $clubHome = Club::where('club_name', $request->clubHome)->first();
        $clubHome = $clubHome->id;
        $clubAway = Club::where('club_name', $request->clubAway)->first();
        $clubAway = $clubAway->id;

        $scoreHome = $request->scoreHome;
        $scoreAway = $request->scoreAway;

        $league = $request->league;

        Match::create([
            'home_club_id' => $clubHome,
            'away_club_id' => $clubAway,
            'score_home' => $scoreHome,
            'score_away' => $scoreAway,
            'league_id' => $league,
            'created_at' => now()
        ]);

        $standingHome = Standing::where('club_id', $clubHome)->first();
        $standingAway = Standing::where('club_id', $clubAway)->first();

        $MPHome = $standingHome->MP + 1;
        $MPAway = $standingAway->MP + 1;

        //* Standing Logic */
        if ($scoreHome > $scoreAway) {
            $wHome = $standingHome->W + 1;
            $dHome = $standingHome->D + 0;
            $lHome = $standingHome->L + 0;

            $wAway = $standingAway->W + 0;
            $dAway = $standingAway->D + 0;
            $lAway = $standingAway->L + 1;

            $ptsHome = $standingHome->Pts + 3;
            $ptsAway = $standingAway->Pts + 0;
        } elseif ($scoreHome == $scoreAway) {
            $wHome = $standingHome->W + 0;
            $dHome = $standingHome->D + 1;
            $lHome = $standingHome->L + 0;

            $wAway = $standingAway->W + 0;
            $dAway = $standingAway->D + 1;
            $lAway = $standingAway->L + 0;

            $ptsHome = $standingHome->Pts + 1;
            $ptsAway = $standingAway->Pts + 1;
        } else {
            $wHome = $standingHome->W + 0;
            $dHome = $standingHome->D + 0;
            $lHome = $standingHome->L + 1;

            $wAway = $standingAway->W + 1;
            $dAway = $standingAway->D + 0;
            $lAway = $standingAway->L + 0;

            $ptsHome = $standingHome->Pts + 0;
            $ptsAway = $standingHome->Pts + 3;
        }

        Standing::where('club_id', $clubHome)
            ->update([
                'MP' => $MPHome,
                'W' => $wHome,
                'D' => $dHome,
                'L' => $lHome,
                'Pts' => $ptsHome,
                'updated_at' => now()
            ]);

        Standing::where('club_id', $clubAway)
            ->update([
                'MP' => $MPAway,
                'W' => $wAway,
                'D' => $dAway,
                'L' => $lAway,
                'Pts' => $ptsAway,
                'updated_at' => now()
            ]);

        if ($ui == 'json') {
            return redirect('/api/match');
        } else {
            return redirect('/');
        }
    }

    //* Standings */
    public function standing($league, $club)
    {
        $club = strtolower($club);

        if ($league == 'all') {
            $standings = Standing::orderBy('Pts', 'desc')->orderBy('W', 'desc')->orderBy('D', 'desc')->orderBy('L', 'desc')->get();
        } else {
            $standings = Standing::where('league_id', $league)->orderBy('Pts', 'desc')->orderBy('W', 'desc')->orderBy('D', 'desc')->orderBy('L', 'desc')->get();
        }

        $standings->map(function ($standing, $key) {
            $standing->ranking = $key + 1;

            return $standing;
        });

        if ($club == 'all') {
            return StandingResource::collection($standings);
        } else {
            foreach ($standings as $st) {
                if (strtolower($st->club->club_name) == $club) {
                    return new StandingResource($st);
                }
            }
        }
    }
}
