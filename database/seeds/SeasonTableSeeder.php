<?php

use App\Season;
use Illuminate\Database\Seeder;

class SeasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	// name, year_start, year_end

	    $season = new Season();
	    $season->name = "2017 - 2018";
	    $season->year_start = 2017;
	    $season->year_end = 2018;
	    $season->save();



    }
}
