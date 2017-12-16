<?php

use App\Difficulty;
use App\Goal;
use App\Match;
use App\Player;
use Illuminate\Database\Seeder;

class GoalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	// Recreate 7 goals: 3 - 4
	    // home
	    $match = Match::find(4);
	    $player = Player::find(37);
    	$this->createGoal($match, $player, 1, 0);
	    $player = Player::find(55);
	    $this->createGoal($match, $player, 1, 1);
	    $player = Player::find(44);
	    $this->createGoal($match, $player, 2, 1, 2);
	    $player = Player::find(56);
	    $this->createGoal($match, $player, 2, 2, 3);
	    $player = Player::find(53);
	    $this->createGoal($match, $player, 3, 2,3);
	    $player = Player::find(40);
	    $this->createGoal($match, $player, 3, 3,3);
	    $player = Player::find(51);
	    $this->createGoal($match, $player, 3, 4,4);

	    $match->score_home = 3;
	    $match->score_visitor = 4;
	    $match->save();





    }

    private function createGoal($match, $player, $scoreHome, $scoreVisitor, $quarter = 1){
	    $goal = new Goal();
	    $goal->division_id = $match->division_id;
	    $goal->match_id = $match->id;
	    $goal->player_id = $player->id;
	    $goal->team_id = $player->team->id;
	    $goal->score_home = $scoreHome;
	    $goal->score_visitor = $scoreVisitor;
	    $goal->quarter = $quarter;
	    $match->goals()->save($goal);


    }
}
