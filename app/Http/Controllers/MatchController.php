<?php

namespace App\Http\Controllers;

use App\Match;
use App\Player;
use App\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class MatchController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 *
	 */
	public function index()
	{
		return Match::with('location')->with('home.players')->with('visitor.players')->get();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$topscorers = DB::table('goals')->selectRaw('player_id, players.name, count(*) as goalscore')->join('players','player_id','=','players.id')->orderBy('goalscore','desc')->groupBy('player_id')->limit(10)->get();

		$season = Season::find(1);
		$standings = $season->teams()->division(1)->orderBy('pivot_won', 'desc')->get();


//
		$match = Match::with('home.players')->with('visitor.players')->find($id);
		return View::make('web.matches.show', array(
			'match' => $match,
			'topscorers' => $topscorers,
			'standings' => $standings
		));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
