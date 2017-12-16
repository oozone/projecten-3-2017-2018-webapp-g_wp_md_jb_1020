<?php

namespace App\Http\Controllers\Admin;

use App\Difficulty;
use App\Division;
use App\Http\Controllers\Controller;
use App\Location;
use App\Player;
use App\Match;
use App\Season;
use App\Team;
use App\Valor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MatchController extends Controller
{
	/**
	 * Display a listing of the matches.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$matches = Match::paginate(20);
		return View::make('admin.matches.index', array('data' => $matches));
	}

	/**
	 * Show the form for creating a new match.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{

		// Get data for html selects
		$teams = Team::pluck('name', 'id');
		$difficulties = Difficulty::pluck('name', 'id');
		$valors = Valor::pluck('name', 'id');
		$seasons = Season::pluck('name', 'id');
		$divisions = Division::pluck('name', 'id');
		$locations = Location::pluck('name', 'id');

		return View::make('admin.matches.create', array(
			'teams' => $teams,
			'difficulties' => $difficulties,
			'valors' => $valors,
			'divisions' => $divisions,
			'locations' => $locations,
			'seasons' => $seasons
		));
	}

	/**
	 * Store a newly created match in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate(request(), [
			'home_id' => 'required|integer',
			'visitor_id' => 'required|integer',
			'datum' => 'required',
			'valor_id' => 'required|integer',
			'division_id' => 'required|integer',
			'difficulty_id' => 'required|integer',
			'location_id' => 'required|integer',
			'season_id' => 'required|integer'
		]);

		// Store new match
		$match = new Match();
		$match->home_id = request()->input('home_id');
		$match->visitor_id = request()->input('visitor_id');
		$match->datum = request()->input('datum');
		$match->valor_id = request()->input('valor_id');
		$match->division_id = request()->input('division_id');
		$match->difficulty_id = request()->input('difficulty_id');
		$match->location_id = request()->input('location_id');
		$match->season_id = request()->input('season_id');
		$match->save();

		return redirect('/admin/matches');
	}

	/**
	 * Display the specified match.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return Match::find($id);
	}

	/**
	 * Show the form for editing the specified match.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$match = Match::findOrFail($id);
		$teams = Team::pluck('name', 'id');
		$divisions = Division::pluck('name', 'id');
		$locations = Location::pluck('name', 'id');
		$seasons = Season::pluck('name', 'id');
		return View::make('admin.matches.edit', array(
			'match' => $match,
			'teams' => $teams,
			'divisions' => $divisions,
			'locations' => $locations,
			'valors' => Valor::pluck('name', 'id'),
			'difficulties' => Difficulty::pluck('name', 'id'),
			'seasons' => $seasons
		));
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

		$this->validate(request(), [
			'home_id' => 'required|integer',
			'visitor_id' => 'required|integer',
			'datum' => 'required',
			'valor_id' => 'required|integer',
			'division_id' => 'required|integer',
			'difficulty_id' => 'required|integer',
			'location_id' => 'required|integer',
			'season_id' => 'required|integer'
		]);

		$match = Match::findOrFail($id);
		$match->home_id = request()->input('home_id');
		$match->visitor_id = request()->input('visitor_id');
		$match->datum = request()->input('datum');
		$match->valor_id = request()->input('valor_id');
		$match->division_id = request()->input('division_id');
		$match->difficulty_id = request()->input('difficulty_id');
		$match->location_id = request()->input('location_id');
		$match->season_id = request()->input('season_id');
		$match->save();

		return redirect('/admin/matches/' . $id .'/edit');
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


	/**
	 * Display a listing of the finalized fina-sheets
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function finasheets()
	{
		$matches = Match::where('finasheet', '!=', null)->paginate(20);
		return View::make('admin.matches.finasheets', array('data' => $matches));
	}

}
