<?php

use App\Coach;
use App\Division;
use App\Season;
use App\Team;
use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	// name, division_id, competition_class

    	// Gent
    	$team = new Team();
    	$team->name = "Moeskroen";
    	//$team->competition_class = "Eerste klasse";
	    $team->logo = "http://voom.be:12005/images/teams/1511276834.jpg";
    	$team->save();
    	$team->coach()->save(Coach::where('name', 'Eerste coach')->first());
	    $division = Division::first();
	    $division->teams()->save($team);


	    $coach = Coach::where('name','Eerste coach')->first();
	    $team->coach()->save($coach);

	    $season = Season::first();
	    $season->teams()->attach($team, [
	    	'played' => 1,
		    'won' => 0,
		    'lost' => 1,
		    'draw' => 0
	    ]);


	    // Antwerpen
	    $team = new Team();
	    $team->name = "Antwerpen";
	    $team->logo = "http://voom.be:12005/images/teams/1511276842.jpeg";
	    //$team->competition_class = "Eerste klasse";
	    $team->save();
	    $team->coach()->save(Coach::where('name', 'Tweede coach')->first());

	    $division = Division::first();
	    $division->teams()->save($team);

	    //$team->division()->save($division);

	    $coach = Coach::where('name','Tweede coach')->first();
	    $team->coach()->save($coach);

	    $season->teams()->attach($team, [
		    'played' => 0,
		    'won' => 0,
		    'lost' => 0,
		    'draw' => 0
	    ]);

	    // Doornik
	    $team = new Team();
	    $team->name = "Doornik";
	    $team->save();
	    $team->coach()->save(Coach::where('name', 'Derde coach')->first());
	    $division->teams()->save($team);

	    $season->teams()->attach($team, [
		    'played' => 0,
		    'won' => 0,
		    'lost' => 0,
		    'draw' => 0
	    ]);

	    // Mechelen
	    $team = new Team();
	    $team->name = "Mechelen";
	    $team->save();
	    $team->coach()->save(Coach::where('name', 'Vierde coach')->first());
	    $division->teams()->save($team);

	    $season->teams()->attach($team, [
		    'played' => 1,
		    'won' => 0,
		    'lost' => 1,
		    'draw' => 0
	    ]);

	    // La Louvière
	    $team = new Team();
	    $team->name = "La Louvière";
	    $team->save();
	    $team->coach()->save(Coach::where('name', 'Vijfde coach')->first());
	    $division->teams()->save($team);

	    $season->teams()->attach($team, [
		    'played' => 0,
		    'won' => 0,
		    'lost' => 0,
		    'draw' => 0
	    ]);

	    // Brussels
	    $team = new Team();
	    $team->name = "Brussels";
	    $team->save();
	    $team->coach()->save(Coach::where('name', 'Zesde coach')->first());
	    $division->teams()->save($team);

	    $season->teams()->attach($team, [
		    'played' => 0,
		    'won' => 0,
		    'lost' => 0,
		    'draw' => 0
	    ]);

	    // Kortrijk
	    $team = new Team();
	    $team->name = "Kortrijk";
	    $team->save();
	    $team->coach()->save(Coach::where('name', 'Zevende coach')->first());
	    $division->teams()->save($team);

	    $season->teams()->attach($team, [
		    'played' => 1,
		    'won' => 1,
		    'lost' => 0,
		    'draw' => 0
	    ]);

	    // Brugge
	    $team = new Team();
	    $team->name = "Brugge";
	    $team->save();
	    $team->coach()->save(Coach::where('name', 'Achtste coach')->first());
	    $division->teams()->save($team);

	    $season->teams()->attach($team, [
		    'played' => 0,
		    'won' => 0,
		    'lost' => 0,
		    'draw' => 0
	    ]);

	    // Bergen
	    $team = new Team();
	    $team->name = "Bergen";
	    $team->save();
	    $team->coach()->save(Coach::where('name', 'Negende coach')->first());
	    $division->teams()->save($team);

	    $season->teams()->attach($team, [
		    'played' => 0,
		    'won' => 0,
		    'lost' => 0,
		    'draw' => 0
	    ]);

	    // Moeskroen B
	    $team = new Team();
	    $team->name = "Moeskroen B";
	    $team->save();
	    $team->addRelatedTeam(1);
	    $team->coach()->save(Coach::where('name', 'Tiende coach')->first());
	    $division = Division::find(2);
	    $division->teams()->save($team);

	    $season->teams()->attach($team, [
		    'played' => 0,
		    'won' => 0,
		    'lost' => 0,
		    'draw' => 0
	    ]);

	    // Brugge B
	    $team = new Team();
	    $team->name = "Brugge B";
	    $team->save();
	    //$team->addRelatedTeam(1);
	    $team->coach()->save(Coach::where('name', 'Dertiende coach')->first());
	    $division = Division::find(2);
	    $division->teams()->save($team);

	    $season->teams()->attach($team, [
		    'played' => 0,
		    'won' => 0,
		    'lost' => 0,
		    'draw' => 0
	    ]);


	    /* TESTMATCH */
	    // Thuis
	    $team = new Team();
	    $team->name = "Thuis";
	    $team->save();
	    //$team->addRelatedTeam(1);
	    $team->coach()->save(Coach::where('name', 'Elfde coach')->first());
	    $division = Division::find(4);
	    $division->teams()->save($team);

	    $season->teams()->attach($team, [
		    'played' => 0,
		    'won' => 0,
		    'lost' => 0,
		    'draw' => 0
	    ]);

	    // Bezoekers
	    $team = new Team();
	    $team->name = "Bezoekers";
	    $team->save();
	    //$team->addRelatedTeam(1);
	    $team->coach()->save(Coach::where('name', 'Twaalfde coach')->first());
	    $division = Division::find(4);
	    $division->teams()->save($team);

	    $season->teams()->attach($team, [
		    'played' => 0,
		    'won' => 0,
		    'lost' => 0,
		    'draw' => 0
	    ]);

    }
}
