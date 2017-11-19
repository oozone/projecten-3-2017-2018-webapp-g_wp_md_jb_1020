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

    	$coach = new Coach();
    	$coach->name = "Eerste coach";
    	$coach->save();



	    $coach = new Coach();
	    $coach->name = "Tweede coach";
	    $coach->save();


	    $coach = new Coach();
	    $coach->name = "Derde coach";
	    $coach->save();

	    $coach = new Coach();
	    $coach->name = "Vierde coach";
	    $coach->save();

	    $coach = new Coach();
	    $coach->name = "Vijfde coach";
	    $coach->save();

	    $coach = new Coach();
	    $coach->name = "Zesde coach";
	    $coach->save();

	    $coach = new Coach();
	    $coach->name = "Zevende coach";
	    $coach->save();

	    $coach = new Coach();
	    $coach->name = "Achtste coach";
	    $coach->save();

	    $coach = new Coach();
	    $coach->name = "Negende coach";
	    $coach->save();

	    $coach = new Coach();
	    $coach->name = "Tiende coach";
	    $coach->save();
    }
}
