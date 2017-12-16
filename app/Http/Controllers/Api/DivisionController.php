<?php

namespace App\Http\Controllers\Api;

use App\Division;
use App\Http\Controllers\Controller;
use App\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DivisionController extends Controller
{
	/**
	 * Display a listing of the divisions.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return Division::get();
	}

	/**
	 * Show the form for creating a new division.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created division in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified division.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//dd($id);
		return Division::with(array('teams'))->find($id);
	}


	/**
	 * Update the specified division in storage.
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
	 * Remove the specified division from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Returns list op topscorers
	 * @param $id
	 *
	 * @return mixed
	 */
	public function topscorers($id){
		return DB::table('goals')->selectRaw('player_id, players.name, count(*) as goalscore')->join('players','player_id','=','players.id')->where('players.division_id','=', $id)->orderBy('goalscore','desc')->groupBy('player_id')->limit(10)->get();

	}

	/**
	 * Returns list of standings per season and division
	 * @param $id
	 * @param $season_id
	 *
	 * @return mixed
	 */
	public function standings($id, $season_id){
		$season = Season::find($season_id);
		$standings = $season->teams()->division($id)->orderBy('pivot_won', 'desc')->get();
		return $standings;
	}
}
