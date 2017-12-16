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
		//$match->datum = date("Y-m-d H:i:s");
	    $match->datum = DateTime::createFromFormat('Y-m-d H:i:s', '2017-12-25 20:00:00');
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
	    $match->datum = DateTime::createFromFormat('Y-m-d H:i:s', '2017-12-25 14:00:00');
	    $match->time_played = "00:00";
	    $match->cancelled = 1;
	    $match->save();

	    $location->matches()->save($match);
	    $difficulty->matches()->save($match);
	    $valor->matches()->save($match);

	    $season->matches()->save($match);


	    // Thuis - Bezoekers
	    $location = Location::where('name', 'Poseidon')->first();
	    $difficulty = Difficulty::first();
	    $valor = Valor::first();

	    $home = Team::where('name', 'Moeskroen B')->first();
	    $visitor = Team::where('name', 'Brugge B')->first();

	    $match = new Match();
	    $match->division_id = 2;
	    $match->home_id = $home->id;
	    $match->visitor_id = $visitor->id;
	    $match->datum = DateTime::createFromFormat('Y-m-d H:i:s', '2017-12-25 14:00:00');
	    $match->time_played = "00:00";
	    $match->save();

	    $location->matches()->save($match);
	    $difficulty->matches()->save($match);
	    $valor->matches()->save($match);

	    $season->matches()->save($match);

	    // Thuis - Bezoekers
	    $location = Location::where('name', 'Rooigem')->first();
	    $difficulty = Difficulty::first();
	    $valor = Valor::first();

	    $home = Team::where('name', 'Thuis')->first();
	    $visitor = Team::where('name', 'Bezoekers')->first();

	    $match = new Match();
	    $match->division_id = 4;
	    $match->home_id = $home->id;
	    $match->visitor_id = $visitor->id;
	    $match->datum = date("Y-m-d H:i:s");
	    $match->match_start = date("Y-m-d H:i:s");
	    $d = new DateTime();
	    $d->add(new DateInterval('PT1H05S'));
	    $match->match_end = $d->format('Y-m-d H:i:s');
	    $match->finasheet = 'finasheet-1513408428.pdf';
	    $match->signed = 1;
	    $match->signer_id = 4;
	    $match->time_played = "00:00";
	    $match->save();

	    $location->matches()->save($match);
	    $difficulty->matches()->save($match);
	    $valor->matches()->save($match);

	    $season->matches()->save($match);


    }
}
