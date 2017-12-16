<?php

namespace App\Http\Controllers;

use App\Match;
use App\Season;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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
		$team = Team::with(array('players'))->findOrFail($id);

		// Get program for this team
		$matches = Match::where('home_id','=',$id)->orWhere('visitor_id','=',$id)->get();

		// Get other teams from division
		$teams = Team::where('division_id', '=', $team->division_id)->get();

		return View::make('web.teams.show', array(
			'team' => $team,
			'matches' => $matches,
			'teams' => $teams
		));
	}

	/**
	 * Show the form for editing the specified team.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
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


}
