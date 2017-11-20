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
	    $match = Match::first();
	    $player = Player::first();
	    $team = $player->team;
    	$this->createGoal($match, $player);
	    $player = Player::find(16);
	    $this->createGoal($match, $player);
	    $player = Player::find(3);
	    $this->createGoal($match, $player);
	    $player = Player::find(18);
	    $this->createGoal($match, $player);
	    $player = Player::find(6);
	    $this->createGoal($match, $player);
	    $player = Player::find(22);
	    $this->createGoal($match, $player);


	    $player = Player::find(24);
	    $this->createGoal($match, $player);

    }

    private function createGoal($match, $player){
	    $goal = new Goal();
	    $goal->match_id = $match->id;
	    $goal->player_id = $player->id;
	    $goal->team_id = $player->team->id;
	    $match->goals()->save($goal);
    }
}
