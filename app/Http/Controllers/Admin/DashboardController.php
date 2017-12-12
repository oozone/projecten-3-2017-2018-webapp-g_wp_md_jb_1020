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

class DashboardController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return View::make('admin.dashboard');
	}

}
