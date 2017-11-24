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
	    $player->status = 1;
	    $player->birthdate = "1984-03-27 00:00";
	    $player->starter = true;
	    $player->photo = "http://voom.be:12005/images/players/1511276995.png";
	    $player->save();
	    $team->players()->save($player);

	    $player = new Player();
	    $player->name = "Bert-Jan Weijermars";
	    $player->player_number = 2;
	    $player->birthdate = date('Y-m-d H:i:s');
	    $player->starter = 1;
	    $player->photo = "http://voom.be:12005/images/players/1511277004.jpg";
	    $player->save();
	    $team->players()->save($player);

	    $this->createPlayer("Julian Eldering", 3, true, $team);
	    $this->createPlayer("Mathijn Hutterd", 4, true, $team);
	    $this->createPlayer("Cees Mark", 5, true, $team);
	    $this->createPlayer("Stefaan Zwinsel", 6, true, $team);
	    $this->createPlayer("Lou Drent", 7, true, $team);
	    $this->createPlayer("Riaz Silvius", 8, false, $team);
	    $this->createPlayer("Samuel van Osch", 9, false, $team);
	    $this->createPlayer("Selahattin Nuijens", 10, false, $team);
	    $this->createPlayer("Konstantin Vervoorn", 11, false, $team);
	    $this->createPlayer("Ajay Duijndam", 12, false, $team);
	    $this->createPlayer("Mateo Hanoeman", 13, false, $team);

	    // Team 2
	    $team = Team::find(2);
	    $this->createPlayer("Jan Souverijn", 1, true, $team);
	    $this->createPlayer("Corneel Kelders", 2, true, $team);
	    $this->createPlayer("Lowie Litteler", 3, true, $team);
	    $this->createPlayer("Walter Voskamp", 4, true, $team);
	    $this->createPlayer("Sjaak Kruit", 5, true, $team);
	    $this->createPlayer("Rudie van Rijn", 6, true, $team);
	    $this->createPlayer("Lodewijk Koedijk", 7, true, $team);
	    $this->createPlayer("Timen Plasmans", 8, false, $team);
	    $this->createPlayer("Casimir Liebrand", 9, false, $team);
	    $this->createPlayer("Louwe Eeken", 10, false, $team);
	    $this->createPlayer("Shadi Backus", 11, false, $team);
	    $this->createPlayer("Tunahan van Hezik", 12, false, $team);
	    $this->createPlayer("Jolle Tienstra", 13, false, $team);

    }

    private function createPlayer($name, $nr, $starter = false, $team){

	    $player = new Player();
	    $player->name = $name;
	    $player->player_number = $nr;
	    $player->starter = $starter;
	    $player->status = 1;
	    $player->birthdate = date('Y-m-d H:i:s');
	    $player->save();
	    $team->players()->save($player);
    }

}
