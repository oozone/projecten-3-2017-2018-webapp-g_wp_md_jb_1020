<?php

use App\Player;
use App\Team;
use Illuminate\Database\Seeder;

class PlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // team_id, player_number, name', 'birthdate', 'status'

	    $team = Team::first();

	    $player = new Player();
	    $player->name = "Christof de Bonheure";
	    $player->player_number = 5;
	    $player->status = true;
	    $player->birthdate = "1984-03-27 00:00";
	    $player->save();
	    $team->players()->save($player);

	    $player = new Player();
	    $player->name = "Testspeler2";
	    $player->player_number = 8;
	    $player->status = true;
	    $player->birthdate = "1984-03-27 00:00";
	    $player->save();
	    $team->players()->save($player);

    }
}
