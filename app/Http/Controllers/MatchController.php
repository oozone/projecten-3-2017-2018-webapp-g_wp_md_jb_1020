<?php

namespace App\Http\Controllers;

use App\Goal;
use App\Match;
use App\Penalty;
use App\PenaltyBook;
use App\Player;
use App\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class MatchController extends Controller
{
	/**
	 * Display a listing of the matches with their locations and home and visitor players.
	 *
	 *
	 */
	public function index()
	{
		return Match::with('location')->with('home.players')->with('visitor.players')->get();
	}

	/**
	 * Show the form for creating a new match.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created match in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	function cmp($a, $b)
	{
		return strcmp($a->created_at, $b->created_at);
	}

	/**
	 * Display the specified match.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{

		$match = Match::with('home.players')->with('visitor.players')->find($id);
		$season = Season::find($match->season_id);

		// Get the topscorers for division
		$topscorers = DB::table('goals')->selectRaw('player_id, players.division_id, players.name, count(*) as goalscore')->join('players','player_id','=','players.id')->where('players.division_id','=', $match->division_id)->orderBy('goalscore','desc')->groupBy('player_id')->limit(10)->get();

		// Get the standings for division
		$standings = $season->teams()->division($match->division_id)->orderBy('pivot_won', 'desc')->get();

		// Get matchdetail for match: goals and faults (merge)
		$goals = collect(Goal::where('match_id', '=', $id)->with('player')->get());
		$penaltybooks = collect(Penalty::where('match_id','=',$id)->with('player')->orderBy('created_at')->get());
		$matchdetail = $goals->merge($penaltybooks)->sortBy('created_at');

		// Sort matchdetail by time created
		$items = $matchdetail->all();
		usort($items, function($a, $b) {
			return $a->created_at <=> $b->created_at;
		});
		$sorted = collect($items);

		return View::make('web.matches.show', array(
			'match' => $match,
			'topscorers' => $topscorers,
			'standings' => $standings,
			'matchdetail' => $sorted
		));
	}

	/**
	 * Show the form for editing the specified match.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified match in storage.
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
	 * Remove the specified match from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}



}
