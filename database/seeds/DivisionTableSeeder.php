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
        $division->name = "First division";
        $division->period_length = "08:00";
        $division->ranking = 2;
        $division->save();

	    $division = new Division();
	    $division->name = "Second division";
	    $division->period_length = "08:00";
	    $division->ranking = 4;
	    $division->save();

	    $division = new Division();
	    $division->name = "Third division";
	    $division->period_length = "08:00";
	    $division->ranking = 6;
	    $division->save();

	    $division = new Division();
	    $division->name = "Fourth division";
	    $division->period_length = "08:00";
	    $division->ranking = 6;
	    $division->save();

	    $division = new Division();
	    $division->name = "Amateur A";
	    $division->period_length = "07:00";
	    $division->ranking = 10;
	    $division->save();

	    $division = new Division();
	    $division->name = "Amateur B";
	    $division->period_length = "07:00";
	    $division->ranking = 12;
	    $division->save();

	    $division = new Division();
	    $division->name = "Amateur C";
	    $division->period_length = "07:00";
	    $division->ranking = 14;
	    $division->save();

	    $division = new Division();
	    $division->name = "Amateur D";
	    $division->period_length = "07:00";
	    $division->ranking = 16;
	    $division->save();

	    $division = new Division();
	    $division->name = "Women First division";
	    $division->period_length = "07:00";
	    $division->ranking = 20;
	    $division->save();

	    $division = new Division();
	    $division->name = "Cup A";
	    $division->period_length = "08:00";
	    $division->ranking = 30;
	    $division->save();

	    $division = new Division();
	    $division->name = "Cup B";
	    $division->period_length = "08:00";
	    $division->ranking = 32;
	    $division->save();

	    $division = new Division();
	    $division->name = "Cup Women";
	    $division->period_length = "07:00";
	    $division->ranking = 36;
	    $division->save();

    }
}
