<?php

use App\Coach;
use App\Team;
use Illuminate\Database\Seeder;

class CoachTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$team = Team::where('name','Gentse WPC')->first();
    	$coach = new Coach();
    	$coach->name = "Eerste coach";
    	$coach->save();


	    $team = Team::where('name','Aalst')->first();
	    $coach = new Coach();
	    $coach->name = "Tweede coach";
	    $coach->save();


	    $team = Team::where('name','Kortrijk')->first();
	    $coach = new Coach();
	    $coach->name = "Derde coach";
	    $coach->save();

    }
}
