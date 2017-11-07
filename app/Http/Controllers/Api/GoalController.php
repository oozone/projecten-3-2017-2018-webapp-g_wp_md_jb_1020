<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Match;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    /**
     * @param \App\Http\Controllers\Api\Request $request
     * @param $id Match Id
     */
    public function store(Request $request){
        $this->validate(request(), [

            'match_id' => 'required|integer',
            'player_id' => 'required|integer',
            'team_id' => 'required|integer',
        ]);

        $match = Match::firstOrFail($request->match_id);

        // Save in score_home or score_visitor
        if($match->home->id == $request->team_id){
            $match->score_home += 1;
        } else {
            $match->score_visitor += 1;
        }
        $match->save();

        $goal = new Goal();
        $goal->match_id = $match->match_id;
        $goal->player_id = $request->player_id;
        $goal->team_id = $request->team_id;
        $match->goals()->save($goal);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $match = Match::firstOrFail($id);
        $match->delete();
    }

}
