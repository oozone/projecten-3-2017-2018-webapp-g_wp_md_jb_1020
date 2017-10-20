<?php

namespace App\Http\Controllers;

use App\Division;
use App\Match;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$divisions = Division::get();
    	$matches = Match::get();
        //return view('welcome', compact('divisions'));
	    return View::make('welcome', array(
	    	'divisions' => $divisions,
		    'matches' => $matches,
	    ));
    }
}
