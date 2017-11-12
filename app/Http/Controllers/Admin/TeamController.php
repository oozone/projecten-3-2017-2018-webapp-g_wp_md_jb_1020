<?php

namespace App\Http\Controllers\Admin;

use App\Coach;
use App\Division;
use App\Http\Controllers\Controller;
use App\Player;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TeamController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$teams= Team::get();
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
		]);

		$team = Team::findOrFail($id);
		$team->name = request()->input('name');
		$team->division_id = request()->input('division_id');
		$team->save();

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
}
