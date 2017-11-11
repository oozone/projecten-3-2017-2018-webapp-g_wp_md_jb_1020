<?php

use App\Difficulty;
use App\Location;
use App\Match;
use App\Team;
use App\Valor;
use Illuminate\Database\Seeder;

class MatchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    // location_id, difficulty_id, 'valor_id', home_id', 'visitor_id', datetime('date'), time('time_played')->default('00:00');

	    // Gent - Aalst
	    $location = Location::first();
	    $difficulty = Difficulty::first();
	    $valor = Valor::first();

	    $home = Team::where('name', 'Gentse WPC')->first();
	    $visitor = Team::where('name', 'Aalst')->first();

		$match = new Match();
		$match->division_id = 1;
	    $match->home_id = $home->id;
	    $match->visitor_id = $visitor->id;
	    $match->score_home = 3;
	    $match->score_visitor = 4;
		$match->datum = date("Y-m-d H:i:s");
		$match->time_played = "00:00";
		$match->save();
		//$match->home()->save($home);
		//$match->visitor()->save($visitor);

		$location = Location::first();
		$location->matches()->save($match);
		$difficulty = Difficulty::first();
		$difficulty->matches()->save($match);
		$valor = Valor::first();
		$valor->matches()->save($match);
		//$match->difficulty()->attach($difficulty);
		//$match->valor()->save($valor);


		// Kortrijk - Aalst
	    $location = Location::where('name', 'Van Eyck')->first();
	    $difficulty = Difficulty::first();
	    $valor = Valor::first();

	    $home = Team::where('name', 'Kortrijk')->first();
	    $visitor = Team::where('name', 'Aalst')->first();

	    $match = new Match();
	    $match->division_id = 1;
	    $match->home_id = $home->id;
	    $match->visitor_id = $visitor->id;
	    $match->datum = date("Y-m-d H:i:s");
	    $match->time_played = "00:00";
	    $match->save();
	    //$match->home()->save($home);
	    //$match->visitor()->save($visitor);

	    $location = Location::first();
	    $location->matches()->save($match);
	    $difficulty = Difficulty::first();
	    $difficulty->matches()->save($match);
	    $valor = Valor::first();
	    $valor->matches()->save($match);

    }
}
