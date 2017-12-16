<?php

namespace App\Http\Controllers\Api;

use App\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
		return Location::find($id);
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
