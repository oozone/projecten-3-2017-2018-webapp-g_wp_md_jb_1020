<?php

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
    	$team->competition_class = "Eerste klasse";
    	$team->save();
	    $team->division()->attach($division);

	    // Aalst
	    $team = new Team();
	    $team->name = "Aalst";
	    $team->competition_class = "Eerste klasse";
	    $team->save();
	    $team->division()->attach($division);

	    // Kortrijk
	    $team = new Team();
	    $team->name = "Kortrijk";
	    $team->competition_class = "Eerste klasse";
	    $team->save();
	    $team->division()->attach($division);

    }
}
