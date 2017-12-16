<?php

namespace App\Http\Controllers\Admin;

use App\Difficulty;
use App\Division;
use App\Http\Controllers\Controller;
use App\Location;
use App\Player;
use App\Match;
use App\Team;
use App\Valor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LocationController extends Controller
{
	/**
	 * Display a listing of the locations.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$locations = Location::paginate(20);
		return View::make('admin.locations.index', array('data' => $locations));
	}

	/**
	 * Show the form for creating a new location.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{

		return View::make('admin.locations.create', array(
		));
	}

	/**
	 * Store a newly created location in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate(request(), [
			'name' => 'required',
			'street' => 'required',
			'postalcode' => 'required',
			'city' => 'required',
			'country' => 'required',

		]);

		// Store new location
		$location = new Location();
		$location->name = request()->input('name');
		$location->street = request()->input('street');
		$location->postalcode = request()->input('postalcode');
		$location->city = request()->input('city');
		$location->country = request()->input('country');
		$location->save();

		return redirect('/admin/locations');
	}

	/**
	 * Display the specified location.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return Location::find($id);
	}

	/**
	 * Show the form for editing the specified location.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$location = Location::findOrFail($id);
		return View::make('admin.locations.edit', array('location' => $location));
	}

	/**
	 * Update the specified location in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{

		$this->validate(request(), [
			'name' => 'required',
			'street' => 'required',
			'postalcode' => 'required',
			'city' => 'required',
			'country' => 'required',
		]);

		// Update the location with new data
		$location = Location::findOrFail($id);
		$location->name = request()->input('name');
		$location->street = request()->input('street');
		$location->postalcode = request()->input('postalcode');
		$location->city = request()->input('city');
		$location->country = request()->input('country');
		$location->save();

		return redirect('/admin/locations/' . $id .'/edit');
	}

	/**
	 * Remove the specified location from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
