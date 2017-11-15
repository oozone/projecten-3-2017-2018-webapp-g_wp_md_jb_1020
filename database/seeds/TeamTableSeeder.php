<?php

use App\Coach;
use App\Division;
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

    	$division = Division::first();

    	// Gent
    	$team = new Team();
    	$team->name = "Gentse WPC";
    	//$team->competition_class = "Eerste klasse";
    	$team->save();
    	$team->coach()->save(Coach::where('name', 'Eerste coach')->first());
	    $division = Division::first();
	    $division->teams()->save($team);


	    $coach = Coach::where('name','Eerste coach')->first();
	    $team->coach()->save($coach);


	    // Aalst
	    $team = new Team();
	    $team->name = "Aalst";
	    //$team->competition_class = "Eerste klasse";
	    $team->save();
	    $team->coach()->save(Coach::where('name', 'Tweede coach')->first());

	    $division = Division::first();
	    $division->teams()->save($team);

	    //$team->division()->save($division);

	    $coach = Coach::where('name','Tweede coach')->first();
	    $team->coach()->save($coach);

	    // Kortrijk
	    $team = new Team();
	    $team->name = "Kortrijk";
	    //$team->competition_class = "Eerste klasse";
	    $team->save();
	    $team->coach()->save(Coach::where('name', 'Derde coach')->first());
	    $division = Division::first();
	    $division->teams()->save($team);

	    $coach = Coach::where('name','Derde coach')->first();
	    $team->coach()->save($coach);

    }
}
