<?php

namespace App\Http\Controllers;

use App\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
	/**
	 * Display a listing of the divisions.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return Division::get();
	}

	/**
	 * Show the form for creating a new division.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created division in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified division with its matches.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$divisions = Division::find($id)->with('matches');
		return View::make('welcome', array(
			'division' => $divisions,
		));
	}

	/**
	 * Show the form for editing the specified division.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified division in storage.
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
	 * Remove the specified division from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
