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


    	// Dauphins
	    $location = new Location();
	    $location->name = "Piscine 'Les Dauphins'";
	    $location->street = "Rue du Père Damien 2";
	    $location->postalcode = "7700";
	    $location->city = "Moeskroen";
	    $location->country = "BE";
	    $location->save();

	    // Wezemberg
	    $location = new Location();
	    $location->name = "Wezemberg";
	    $location->street = "Desguinslei 17-19";
	    $location->postalcode = "2018";
	    $location->city = "Antwerpen";
	    $location->country = "BE";
	    $location->save();

		// Tournai
	    $location = new Location();
	    $location->name = "Aqua Tournai";
	    $location->street = "Rue de l'Orient";
	    $location->postalcode = "7500";
	    $location->city = "Doornik";
	    $location->country = "BE";
	    $location->save();

	    // Geerdegemvaart
	    $location = new Location();
	    $location->name = "Sportcomplex Geerdegemvaart";
	    $location->street = "Leliestraat";
	    $location->postalcode = "2800";
	    $location->city = "Mechelen";
	    $location->country = "BE";
	    $location->save();

	    // la louvière
	    $location = new Location();
	    $location->name = "Piscine Communale";
	    $location->street = "Le Point d'Eau, Rue Sylvain Guyaux 121";
	    $location->postalcode = "7100";
	    $location->city = "La Louvière";
	    $location->country = "BE";
	    $location->save();

	    // brussels
	    $location = new Location();
	    $location->name = "Poseidon";
	    $location->street = "Avenue des Vaillants 2";
	    $location->postalcode = "1200";
	    $location->city = "Brussel";
	    $location->country = "BE";
	    $location->save();

	    // kortrijk
	    $location = new Location();
	    $location->name = "Zwembad Sportpunt";
	    $location->street = "Bekaertstraat 4";
	    $location->postalcode = "8550";
	    $location->city = "Zwevegem";
	    $location->country = "BE";
	    $location->save();

	    // brugge
	    $location = new Location();
	    $location->name = "Olympiabad";
	    $location->street = "Doornstraat 110";
	    $location->postalcode = "8200";
	    $location->city = "Sint Andries";
	    $location->country = "BE";
	    $location->save();

	    // bergen
	    $location = new Location();
	    $location->name = "Piscine Ombelia";
	    $location->street = "Rue Jean Mermoz, 117";
	    $location->postalcode = "59920";
	    $location->city = "Quievrechain";
	    $location->country = "FR";
	    $location->save();


	    // rooigem
	    $location = new Location();
	    $location->name = "Rooigem";
	    $location->street = "Peerstraat 1";
	    $location->postalcode = "9000";
	    $location->city = "Gent";
	    $location->country = "BE";
	    $location->save();

    }
}
