<?php

namespace App\Http\Controllers\Api;

use App\Goal;
use App\Http\Controllers\Controller;
use App\Match;
use App\Player;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    /**
     * Store the goal
     * @param \App\Http\Controllers\Api\Request $request
     * @param $id Match Id
     */
    public function store(Request $request){
        $this->validate($request, [

            'match_id' => 'required|integer',
            'player_id' => 'required|integer',
	        'quarter' => 'required|integer'
        ]);

        $match = Match::find($request->match_id);
        $player = Player::find($request->player_id);



        // Save in score_home or score_visitor
        if($match->home->id == $player->team_id){
            $match->score_home += 1;
        } else {
            $match->score_visitor += 1;
        }
        $match->save();

        // Save new goal
        $goal = new Goal();
        $goal->match_id = $match->match_id;
        $goal->division_id = $match->division_id;
        $goal->player_id = $request->player_id;
        $goal->team_id = $player->team_id;
        $goal->score_home = $match->score_home;
        $goal->score_visitor = $match->score_visitor;
        $goal->quarter = $request->quarter;

        // Save goal in related match
        $match->goals()->save($goal);

    }

    /**
     * Remove the specified goal from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $match = Goal::firstOrFail($id);
        $match->delete();
    }

}
