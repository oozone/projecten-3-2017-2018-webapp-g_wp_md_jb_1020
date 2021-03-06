<?php

namespace App\Http\Controllers\Admin;

use App\Division;
use App\Http\Controllers\Controller;
use App\Player;
use App\Team;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PlayerController extends Controller
{
	/**
	 * Display a listing of the players.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$players = Player::paginate(20);
		return View::make('admin.players.index', array('players' => $players));
	}

	/**
	 * Show the form for creating a new player.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$teams = Team::get();
		$divisions = Division::get();
		return View::make('admin.players.create', array('teams' => $teams, 'divisions' => $divisions));
	}

	/**
	 * Store a newly created player in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate(request(), [
			'name' => 'required',
			'date' => 'required',
			'player_number' => 'required|integer',
			'team' => 'required|integer',
			'division' => 'required|integer'
		]);

		// Store new player
		$player = new Player();
		$player->name = request()->input('name');
		$player->player_number = request()->input('player_number');
		$player->birthdate = request()->input('date');
		$player->starter = request()->input('starter');
		$player->status = request()->input('status');
		$player->division_id = 	request()->input('division');


		// Save image
		if(request()->hasFile('image'))
		{
			$image = request()->file('image');
			$filename  = time() . '.' . $image->getClientOriginalExtension();

			// Save in public path
			$path = public_path('images/players/' . $filename);

			// Resize image
			Image::make($image->getRealPath())->resize(500, 500)->save($path);
			$player->photo = url('/') . "/images/players/" . $filename;
		}

		$player->save();

		$team = Team::find(request()->input('team'));
		$team->players()->save($player);

		return redirect('/admin/players');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return Player::with('team')->find($id);
	}

	/**
	 * Show the form for editing the specified player.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$player = Player::findOrFail($id);
		$teams = Team::pluck('name', 'id');
		$divisions = Division::pluck('name', 'id');
		return View::make('admin.players.edit', array('player' => $player, 'teams' => $teams, 'divisions' => $divisions));
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

		$this->validate(request(), [
			'name' => 'required',
			'birthdate' => 'required',
			'player_number' => 'required|integer',
			'team_id' => 'required|integer',
			'division_id' => 'required|integer'
		]);

		$player = Player::findOrFail($id);

		// Save image
		if(request()->hasFile('image'))
		{
			$image = request()->file('image');
			$filename  = time() . '.' . $image->getClientOriginalExtension();

			// Save to public path
			$path = public_path('images/players/' . $filename);

			// Resize image
			Image::make($image->getRealPath())->resize(500, 500)->save($path);
			$player->photo = url('/') . "/images/players/" . $filename;
		}

		// Update player data
		$player->name = request()->input('name');
		$player->player_number = request()->input('player_number');
		$player->birthdate = request()->input('birthdate');
		$player->starter = request()->input('starter');
		$player->status = request()->input('status');
		$player->division_id = 	request()->input('division_id');
		$player->save();

		$team = Team::find(request()->input('team_id'));
		$team->players()->save($player);

		return redirect('/admin/players/' . $id .'/edit');
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
