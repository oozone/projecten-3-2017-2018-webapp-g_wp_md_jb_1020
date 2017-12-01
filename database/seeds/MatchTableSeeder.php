<?php

use App\Difficulty;
use App\Location;
use App\Match;
use App\Season;
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

	    // Moeskroen - Antwerpen
	    $location = Location::where('name', 'like', 'dauphins')->first();
	    $difficulty = Difficulty::first();
	    $valor = Valor::first();

	    $home = Team::where('name', 'Moeskroen')->first();
	    $visitor = Team::where('name', 'Antwerpen')->first();

		$match = new Match();
		$match->division_id = 1;
	    $match->home_id = $home->id;
	    $match->visitor_id = $visitor->id;
	    $match->score_home = 0;
	    $match->score_visitor = 0;
		$match->datum = date("Y-m-d H:i:s");
		$match->time_played = "00:00";
		$match->save();


		$location = Location::first();
		$location->matches()->save($match);
		$difficulty = Difficulty::first();
		$difficulty->matches()->save($match);
		$valor = Valor::first();
		$valor->matches()->save($match);

		$season = Season::first();
		$season->matches()->save($match);



		// Kortrijk - Mechelen
	    $location = Location::where('name', 'Zwembad Sportpunt')->first();
	    $difficulty = Difficulty::first();
	    $valor = Valor::first();

	    $home = Team::where('name', 'Kortrijk')->first();
	    $visitor = Team::where('name', 'Mechelen')->first();

	    $match = new Match();
	    $match->division_id = 1;
	    $match->home_id = $home->id;
	    $match->visitor_id = $visitor->id;
	    $match->datum = date("Y-m-d H:i:s");
	    $match->time_played = "00:00";
	    $match->save();

	    $location->matches()->save($match);
	    $difficulty->matches()->save($match);
	    $valor->matches()->save($match);

	    $season->matches()->save($match);

    }
}
