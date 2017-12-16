<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

	/**
	 * Display a listing of the teams.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return Team::get();
	}

	/**
	 * Show the form for creating a new team.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created team in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified team.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//dd($id);
		return Team::with('players')->find($id);
	}

	/**
	 * Update the specified team in storage.
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
	 * Remove the specified team from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Returns all players from related teams
	 * @param $id
	 *
	 * @return array
	 */
	public function getAllPlayersFromRelatedTeams($id){
		$players = array();

		// Get team with all related players
		$team = Team::where('id','=',$id)->with(['players', 'relatedTeams','relatedTeams.players'])->get();


		// Extract the players
		foreach($team[0]->players as $p){
			$players[] = $p;
		}

		foreach($team[0]->relatedTeams as $rt){
			foreach($rt->players as $p){
				$players[] = $p;
			}
		}

		return $players;

	}


}
