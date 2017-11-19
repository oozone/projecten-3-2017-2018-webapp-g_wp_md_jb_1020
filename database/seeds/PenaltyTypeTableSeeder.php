<?php

use App\Location;
use App\PenaltyType;
use Illuminate\Database\Seeder;

class PenaltyTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	    $penaltytype = new PenaltyType();
	    $penaltytype->name = "U20";
	    $penaltytype->save();

	    $penaltytype = new PenaltyType();
	    $penaltytype->name = "UMV";
	    $penaltytype->save();

	    $penaltytype = new PenaltyType();
	    $penaltytype->name = "U4";
	    $penaltytype->save();


    }
}
