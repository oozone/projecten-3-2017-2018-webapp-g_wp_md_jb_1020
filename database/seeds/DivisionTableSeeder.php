<?php

use App\Division;
use Illuminate\Database\Seeder;

class DivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	// name, period_length

        $division = new Division();
        $division->name = "Eerste klasse";
        $division->period_length = "08:00";
        $division->save();

	    $division = new Division();
	    $division->name = "Tweede klasse";
	    $division->period_length = "08:00";
	    $division->save();
    }
}
