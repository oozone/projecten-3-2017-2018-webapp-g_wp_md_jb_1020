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
	    $player->name = "Chris Bonheure";
	    $player->player_number = 1;
	    $player->status = 1;
	    $player->birthdate = "1984-03-27 00:00";
	    $player->starter = true;
	    $player->division_id = 1;
	    $player->photo = "http://voom.be:12005/images/players/1511276995.png";
	    $player->save();
	    $team->players()->save($player);

	    $player = new Player();
	    $player->name = "Bert Weijer";
	    $player->player_number = 2;
	    $player->birthdate = date('Y-m-d H:i:s');
	    $player->starter = 1;
	    $player->division_id = 1;
	    $player->photo = "http://voom.be:12005/images/players/1511277004.jpg";
	    $player->save();
	    $team->players()->save($player);

	    $this->createPlayer("Julian Eldering", 3, true, $team);
	    $this->createPlayer("Mathijn Hutterd", 4, true, $team);
	    $this->createPlayer("Cees Mark", 5, true, $team);
	    $this->createPlayer("Stefaan Zwinsel", 6, true, $team);
	    $this->createPlayer("Lou Drent", 7, true, $team);
	    $this->createPlayer("Riaz Silvius", 8, true, $team);
	    $this->createPlayer("Samuel Osch", 9, true, $team);
	    $this->createPlayer("Selah Nuijens", 10, true, $team);
	    $this->createPlayer("Stan Vervoorn", 11, true, $team);
	    $this->createPlayer("Ajay Duijndam", 12, true, $team);
	    $this->createPlayer("Mateo Hanoeman", 13, true, $team);
	    $this->createPlayer("Elco Derks", 1, false, $team);
	    $this->createPlayer("Luuk Wallenburg", 2, false, $team);
	    $this->createPlayer("Ruud Kemper", 3, false, $team);
	    $this->createPlayer("Lowie Rijnders", 4, false, $team);

	    // Team 2
	    $team = Team::find(2);
	    $this->createPlayer("Jan Souverijn", 1, true, $team);
	    $this->createPlayer("Corneel Kelders", 2, true, $team);
	    $this->createPlayer("Lowie Litteler", 3, true, $team);
	    $this->createPlayer("Walter Voskamp", 4, true, $team);
	    $this->createPlayer("Sjaak Kruit", 5, true, $team);
	    $this->createPlayer("Jens Buysse", 6, true, $team, 1, "http://voom.be:12005/images/players/1513277937.jpg");
	    $this->createPlayer("Lodewijk Koedijk", 7, true, $team);
	    $this->createPlayer("Timen Plasmans", 8, true, $team);
	    $this->createPlayer("Casimir Liebrand", 9, true, $team);
	    $this->createPlayer("Louwe Eeken", 10, true, $team);
	    $this->createPlayer("Shadi Backus", 11, true, $team);
	    $this->createPlayer("Tunahan van Hezik", 12, true, $team);
	    $this->createPlayer("Jolle Tienstra", 13, true, $team);
	    $this->createPlayer("Arjan Wibbens", 1, false, $team);
	    $this->createPlayer("Mathies Meuleman", 2, false, $team);
	    $this->createPlayer("Arnout Deijk", 3, false, $team);
	    $this->createPlayer("Jelle Gerrits", 4, false, $team);


	    // Team 10 Moeskroen B
	    $team = Team::find(10);
	    $this->createPlayer("Moeskroentester", 1, true, $team);

	    // Team 11 Thuis
	    $team = Team::find(12);
	    $this->createPlayer("Gabriel Lagrand", 1, true, $team, 4);
	    $this->createPlayer("Gersom Boes", 2, true, $team,4);
	    $this->createPlayer("Floyd Knoef", 3, true, $team,4);
	    $this->createPlayer("Jordan de Vet", 4, true, $team,4);
	    $this->createPlayer("Benoit Zitteren", 5, true, $team,4);
	    $this->createPlayer("Gerrie Weening", 6, true, $team,4);
	    $this->createPlayer("Arjun Bijen", 7, true, $team,4);
	    $this->createPlayer("Cornelus van Ek", 8, true, $team,4);
	    $this->createPlayer("Pavel Hoogkamp", 9, true, $team,4);
	    $this->createPlayer("Ramon Menten", 10, true, $team,4);
	    $this->createPlayer("Ricardo Cuijpers", 11, true, $team,4);
	    $this->createPlayer("Renger Klepper", 12, true, $team,4);
	    $this->createPlayer("Thymo Iqbal", 13, true, $team,4);
	    $this->createPlayer("Moses Zuiderveld", 1, false, $team,4);

	    // Team 12 Bezoekers
	    $team = Team::find(13);
	    $this->createPlayer("Lourens Jansens", 1, true, $team,4);
	    $this->createPlayer("Neville Arkesteijn", 2, true, $team,4);
	    $this->createPlayer("Seger Tibbe", 3, true, $team,4);
	    $this->createPlayer("Wytse Luisman", 4, true, $team,4);
	    $this->createPlayer("Dante Bastiaanssen", 5, true, $team,4);
	    $this->createPlayer("Ate Janson", 6, true, $team,4);
	    $this->createPlayer("Marvin Sneller", 7, true, $team,4);
	    $this->createPlayer("Tjitse Bronsema", 8, true, $team,4);
	    $this->createPlayer("Yonis Wijngaarden", 9, true, $team,4);
	    $this->createPlayer("Patrick Luijken", 10, true, $team,4);
	    $this->createPlayer("Donald Kempen", 11, true, $team,4);
	    $this->createPlayer("Tunahan Mus", 12, true, $team,4);
	    $this->createPlayer("Viresh Boomstra", 13, true, $team,4);
	    $this->createPlayer("Giovanni Erkens", 1, false, $team,4);


    }

    private function createPlayer($name, $nr, $starter = false, $team, $division = 1, $image = ""){

	    $player = new Player();
	    $player->name = $name;
	    $player->player_number = $nr;
	    $player->starter = $starter;
	    $player->status = 1;
	    $player->division_id = $division;
	    $player->birthdate = date('Y-m-d H:i:s');
	    if($image != "")
	    	$player->photo = $image;
	    $player->save();
	    $team->players()->save($player);
    }

}
