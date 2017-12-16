<?php

namespace App\Http\Controllers;

use App\Location;
//use Cornford\Googlmapper\Mapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Mapper;

class LocationController extends Controller
{
	/**
	 * Display a listing of the locations.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return Location::get();
	}

	/**
	 * Show the form for creating a new location.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created location in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified location.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$location = Location::find($id);
		$locations = Location::get();
		return View::make('web.locations.show', array(
			'location' => $location,
			'locations' => $locations,
		));
	}

	/**
	 * Show the form for editing the specified location.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
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
		//
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
