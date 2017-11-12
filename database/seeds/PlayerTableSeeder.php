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
	    $player->player_number = 1;
	    $player->status = true;
	    $player->birthdate = "1984-03-27 00:00";
	    $player->starter = true;
	    $player->save();
	    $team->players()->save($player);

	    $player->name = "Bert-Jan Weijermars";
	    $player->player_number = 2;
	    $player->starter = true;
	    $player->save();
	    $team->players()->save($player);

	    $this->createPlayer("Julian Eldering", 3, true, $team);
	    $this->createPlayer("Mathijn Hutterd", 4, true, $team);
	    $this->createPlayer("Cees Mark", 5, true, $team);
	    $this->createPlayer("Stefaan Zwinsel", 6, false, $team);
	    $this->createPlayer("Julian Eldering", 7, false, $team);

	    // Team 2
	    $team = Team::find(2);
	    $this->createPlayer("Jan Souverijn", 1, true, $team);
	    $this->createPlayer("Corneel Kelders", 2, true, $team);
	    $this->createPlayer("Lowie Litteler", 3, true, $team);
	    $this->createPlayer("Walter Voskamp", 4, true, $team);
	    $this->createPlayer("Sjaak Kruit", 5, true, $team);
	    $this->createPlayer("Rudie van Rijn", 6, false, $team);
	    $this->createPlayer("Lodewijk Koedijk", 7, false, $team);

    }

    private function createPlayer($name, $nr, $starter = false, $team){

	    $player = new Player();
	    $player->name = $name;
	    $player->player_number = $nr;
	    $player->starter = $starter;
	    $player->status = true;
	    $player->birthdate = date('Y-m-d H:i:s');
	    $player->save();
	    $team->players()->save($player);
    }

}
