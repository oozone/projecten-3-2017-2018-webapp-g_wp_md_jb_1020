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
        $division->name = "Eerste klasse Heren";
        $division->period_length = "08:00";
        $division->ranking = 2;
        $division->save();

	    $division = new Division();
	    $division->name = "Tweede klasse Heren";
	    $division->period_length = "08:00";
	    $division->ranking = 5;
	    $division->save();

	    $division = new Division();
	    $division->name = "Eerste klasse Vrouwen";
	    $division->period_length = "08:00";
	    $division->ranking = 10;
	    $division->save();
    }
}
