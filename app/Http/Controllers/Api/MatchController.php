<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Match;
//use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade as PDF;

class MatchController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Match::with('location')->get();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//dd($id);
		return Match::with(array('location', 'difficulty', 'valor','home','visitor','penaltybooks'))->find($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	public function generatePdf($id){

		$match = Match::findOrFail($id);

		$pdf = PDF::loadView('pdf.finasheet', $match)->setPaper('a4', 'landscape');
		return $pdf->download('finasheet.pdf');

	}


}
