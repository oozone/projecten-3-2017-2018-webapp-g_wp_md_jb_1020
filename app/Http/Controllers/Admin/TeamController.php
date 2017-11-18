<?php

namespace App\Http\Controllers\Admin;

use App\Coach;
use App\Division;
use App\Http\Controllers\Controller;
use App\Player;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;

class TeamController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$teams= Team::paginate(20);
		return View::make('admin.teams.index', array('data' => $teams));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$divisions = Division::pluck('name', 'id');
		return View::make('admin.teams.create', array('divisions' => $divisions));
	}

	/**
	 * Store a newly created resource in storage.
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

		$team = new Team();
		$team->name = request()->input('name');
		$team->division_id = request()->input('division_id');

		// Save image
		if(request()->hasFile('image'))
		{
			// Remove cache tag
			//Player::flushCache('status_consulenten');
			$image = request()->file('image');
			$filename  = time() . '.' . $image->getClientOriginalExtension();

			$path = public_path('images/teams/' . $filename);

			Image::make($image->getRealPath())->resize(500, 500)->save($path);
			$team->logo = url('/') . "/images/teams/" . $filename;
		}

		$team->save();

		$coach = new Coach();
		$coach->name = request()->input('coach');
		$coach->team_id = $team->id;
		$coach->save();

		return redirect('/admin/teams');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return Team::find($id);
	}

	/**
	 * Show the form for editing the specified resource.
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
	 * Update the specified resource in storage.
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

		if(request()->hasFile('image'))
		{
			// Remove cache tag
			//Player::flushCache('status_consulenten');
			$image = request()->file('image');
			$filename  = time() . '.' . $image->getClientOriginalExtension();

			$path = public_path('images/teams/' . $filename);

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

	public function csv($id)
	{
		$team = Team::findOrFail($id);
		return View::make('admin.teams.csv', array('team' => $team));
	}

	public function csvImport($id)
	{
		$this->validate(request(), [
			'csv' => 'required',
		]);

		$team = Team::findOrFail($id);

		if(request()->hasFile('csv'))
		{
			$csvFile = request()->file('csv');

			Excel::load($csvFile, function($reader) use ($team) {

				//Excel::selectSheetsByIndex(0)->load();

				// Getting all results
				$results = $reader->get();


				foreach($results as $result){
					//dd($result->name);

					$player = new Player();
					$player->name = $result->name;
					$player->player_number = $result->player_number;
					$player->birthdate = $result->birthdate;
					$player->status = $result->status;
					$player->starter = $result->starter;

					$team->players()->save($player);

				}

			});



		}




		return redirect('/admin/players/');
	}



}
