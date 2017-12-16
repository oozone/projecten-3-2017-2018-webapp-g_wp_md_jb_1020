<?php

namespace App\Http\Controllers;

use App\Division;
use App\Match;
use App\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $season = Season::current()->first();

    	// List of divisions with related matches
    	$divisions = Division::with('matches')->orderBy('ranking','asc')->get();

    	// List of standings from first division
	    $standings = $season->teams()->division(1)->orderBy('pivot_won', 'desc')->get();

	    // List of topsccorers from first division
	    $topscorers = DB::table('goals')->selectRaw('player_id, players.name, count(*) as goalscore')->join('players','player_id','=','players.id')->where('players.division_id','=', 1)->orderBy('goalscore','desc')->groupBy('player_id')->limit(10)->get();

	    return View::make('welcome', array(
	    	'divisions' => $divisions,
		    'standings' => $standings,
		    'topscorers' => $topscorers
	    ));
    }
}
