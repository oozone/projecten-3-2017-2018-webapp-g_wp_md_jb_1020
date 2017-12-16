<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
	/**
	 * Display a listing of the active players.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return Player::active()->get();
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
	 *
	 */
	public function show($id)
	{
		return Player::with('team')->with('penalties')->find($id);
	}

	/**
	 * Display the specified player with penalties for that specified match.
	 *
	 * @param  int  $id
	 *
	 */
	public function showMatch($id, $matchId)
	{
		return Player::with('team')->with(['penalties' => function ($query) use ($matchId) {
			$query->where('match_id', '=', $matchId);
		}])->find($id);
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


	/**
	 * Change the player number for the specified player.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function changePlayerNumber(Request $request, $id)
	{
		$this->validate(request(), [
			'player_number' => 'required|integer',
		]);

		$player = Player::findOrFail($id);
		$player->player_number = $request->player_number;
		$player->save();

	}

}
