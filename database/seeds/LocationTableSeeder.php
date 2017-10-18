<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	// Name, street, postalcode, city, country


    	// Strop
	    $location = new Location();
	    $location->name = "Strop";
	    $location->street = "Stropstraat 1";
	    $location->postalcode = "9000";
	    $location->city = "Gent";
	    $location->country = "BE";
	    $location->save();

	    // Van Eyck
	    $location = new Location();
	    $location->name = "Van Eyck";
	    $location->street = "Veermanplein 1";
	    $location->postalcode = "9000";
	    $location->city = "Gent";
	    $location->country = "BE";
	    $location->save();



    }
}
