<?php

use App\Difficulty;
use Illuminate\Database\Seeder;

class DifficultyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	// name, shortcode

	    $difficulty = new Difficulty();
	    $difficulty->name = "Moeilijkheid";
	    $difficulty->shortcode = "TE";
	    $difficulty->save();


    }
}
