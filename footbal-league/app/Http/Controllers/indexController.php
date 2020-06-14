<?php

namespace App\Http\Controllers;

use App\League;
use App\Club;
use App\Standing;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $leagues = League::all();
        $clubs = Club::all();
        $standings = Standing::orderBy('Pts', 'desc')->orderBy('W', 'desc')->orderBy('D', 'desc')->orderBy('L', 'desc')->get();

        return view('index', [
            'leagues' => $leagues,
            'clubs' => $clubs,
            'standings' => $standings
        ]);
    }

    public function sorry()
    {
        return view('sorry');
    }
}
