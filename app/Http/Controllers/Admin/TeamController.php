<?php

namespace App\Http\Controllers\Admin;

use App\Coach;
use App\Division;
use App\Http\Controllers\Controller;
use App\Player;
use App\Team;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;

class TeamController extends Controller
{
	/**
	 * Display a listing of the teams.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$teams= Team::paginate(20);
		return View::make('admin.teams.index', array('data' => $teams));
	}

	/**
	 * Show the form for creating a new reamresource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$divisions = Division::pluck('name', 'id');
		return View::make('admin.teams.create', array('divisions' => $divisions));
	}

	/**
	 * Stores team + coach
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate(request(), [
			'name' => 'required',
			'division_id' => 'required|integer',
			'coach' => 'required',
		]);

		// Store new team
		$team = new Team();
		$team->name = request()->input('name');
		$team->division_id = request()->input('division_id');

		// Save image
		if(request()->hasFile('image'))
		{
			$image = request()->file('image');
			$filename  = time() . '.' . $image->getClientOriginalExtension();

			// Save to public path
			$path = public_path('images/teams/' . $filename);

			// Resize image
			Image::make($image->getRealPath())->resize(500, 500)->save($path);
			$team->logo = url('/') . "/images/teams/" . $filename;
		}

		$team->save();

		// Also save coach
		$coach = new Coach();
		$coach->name = request()->input('coach');
		$coach->team_id = $team->id;
		$coach->save();

		return redirect('/admin/teams');
	}

	/**
	 * Display the team.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return Team::find($id);
	}

	/**
	 * Show the form for editing teams.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$team = Team::findOrFail($id);
		$divisions = Division::pluck('name', 'id');
		return View::make('admin.teams.edit', array('team' => $team, 'divisions' => $divisions));
	}

	/**
	 * Update teams in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{

		$this->validate(request(), [
			'name' => 'required',
			'division_id' => 'required',
			'coach' => 'required'
		]);

		$team = Team::findOrFail($id);
		$team->name = request()->input('name');
		$team->division_id = request()->input('division_id');

		// Save image
		if(request()->hasFile('image'))
		{
			$image = request()->file('image');
			$filename  = time() . '.' . $image->getClientOriginalExtension();

			// Save to public path
			$path = public_path('images/teams/' . $filename);

			// Resize image
			Image::make($image->getRealPath())->resize(500, 500)->save($path);
			$team->logo = url('/') . "/images/teams/" . $filename;
		}

		$team->save();

		// Update coach
		$coach = Coach::where('team_id', $team->id)->first();
		$coach->name = request()->input('coach');
		$coach->save();


		return redirect('/admin/teams/' . $id .'/edit');
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
	 * Show related teams form
	 * @param $id
	 *
	 * @return mixed
	 */
	public function relatedTeams($id){
		$team = Team::with('relatedTeams')->find($id);
		$teams = Team::where([ ['id','!=', $id],['division_id','!=',$team->division_id] ])->pluck('name','id');
		$idRelatedTeams = [];
		foreach($team->relatedTeams as $rt){
			$idRelatedTeams[] = $rt->id;
		}

		return View::make('admin.teams.relatedteams', array(
			'team' => $team,
			'teams' => $teams,
			'relatedTeams' => $idRelatedTeams,
		));
	}

	/**
	 * Update related teams
	 * @param Request $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function updateRelatedTeams(Request $request, $id)
	{

		$team = Team::findOrFail($id);

		// Remove all related teams
		foreach($team->relatedTeams as $rt){
			$team = Team::find($rt->id);
			$team->removeRelatedTeam($id);
		}
		$team->relatedTeams()->detach();

		// If teams are not null save them
		if(($request->teams != null) && !empty($request->teams)){
			foreach($request->teams as $rt){
				$team->addRelatedTeam($rt);
			}
		}

		return redirect('/admin/teams/' . $id .'/edit');
	}

	/**
	 * Show csv players upload form
	 * @param $id
	 *
	 * @return mixed
	 */
	public function csv($id)
	{
		$team = Team::findOrFail($id);
		return View::make('admin.teams.csv', array('team' => $team));
	}

	/**
	 * Import players from CSV-file
	 * @param $id teamid
 	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function csvImport($id)
	{
		$this->validate(request(), [
			'csv' => 'required',
		]);

		$team = Team::findOrFail($id);

		// Check if request has csv
		if(request()->hasFile('csv'))
		{
			$csvFile = request()->file('csv');

			// Load csv file with Excel extension
			Excel::load($csvFile, function($reader) use ($team) {

				// Getting all results
				$results = $reader->get();

				// Loop through all results / rows
				foreach($results as $result){

					if($result->name == "") break;

					// Save new player from data
					$player = new Player();
					$player->name = $result->name;
					$player->division_id = $team->division_id;
					$player->player_number = $result->player_number;
					$player->birthdate = $result->birthdate;
					$player->status = $result->status;
					$player->starter = $result->starter;

					try {
						$team->players()->save($player);
					} catch (Exception $e){

					}
				}

			});
		}

		return redirect('/admin/players/');
	}



}
