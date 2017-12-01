<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Match;
use App\Penalty;
use Illuminate\Http\Request;

class PenaltyController extends Controller
{

	/**
	 * Store a newly created resource in storage.
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

//		$penaltybook = PenaltyBook::where([
//			['match_id', '=', $request->match_id],
//			['player_id', '=', $request->player_id]
//		])->first();

//		// if no penaltybook, create one
//		if($penaltybook == null || $penaltybook->count() < 1){
//			$penaltybook = new PenaltyBook();
//			$penaltybook->match_id = $request->match_id;
//			$penaltybook->player_id = $request->player_id;
//			$penaltybook->save();
//		}

		$match = Match::findOrFail($request->match_id);

		$penalty = new Penalty();
		$penalty->penalty_type_id = $request->penalty_type_id;
		//$penalty->match_id = $request->match_id;
		$penalty->player_id = $request->player_id;
		//$penaltybook->penalties()->save($penalty);
		$match->penalties()->save($penalty);

	}


}
