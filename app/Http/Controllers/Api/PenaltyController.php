<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Match;
use App\Penalty;
use Illuminate\Http\Request;

class PenaltyController extends Controller
{

	/**
	 * Store a newly created penalty in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate(request(), [
			'match_id' => 'required|integer',
			'player_id' => 'required|integer',
			'penalty_type_id' => 'required|integer',
		]);

		$match = Match::findOrFail($request->match_id);

		// Save new penalty
		$penalty = new Penalty();
		$penalty->penalty_type_id = $request->penalty_type_id;
		$penalty->player_id = $request->player_id;

		// Save penalty in related match
		$match->penalties()->save($penalty);

	}


}
