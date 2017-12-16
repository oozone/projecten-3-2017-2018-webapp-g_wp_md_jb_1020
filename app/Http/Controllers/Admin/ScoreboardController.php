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

class ScoreboardController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$matches = Match::notEnded()->notCancelled()->paginate(20);
		return View::make('admin.scoreboard.index', array('data' => $matches));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$match = Match::findOrFail($id);
		return View::make('admin.scoreboard.view', array('match' => $match));
	}


}
