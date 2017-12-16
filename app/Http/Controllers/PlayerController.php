<?php

namespace App\Http\Controllers;

use App\Player;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class PlayerController extends Controller
{
	/**
	 * Display a listing of the active players with their team.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return Player::with('team')->active()->get();
	}

	/**
	 * Show the form for creating a new player.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created player in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified player.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$player = Player::findOrFail($id);
		$team = Team::find($player->team_id);

		// Get the goals scored by player
		$goals = $topscorers = DB::table('goals')->selectRaw('count(*) as goalscore')->where('player_id','=',$id)->get();

		return View::make('web.players.show', array(
			'player' => $player,
			'team' => $team->players,
			'goals' => $goals
		));
	}

	/**
	 * Show the form for editing the specified player.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified player in storage.
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
	 * Remove the specified player from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
