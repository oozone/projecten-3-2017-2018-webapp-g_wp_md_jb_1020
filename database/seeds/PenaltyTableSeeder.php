<?php

use App\Location;
use App\Penalty;
use App\PenaltyBook;
use App\PenaltyType;
use Illuminate\Database\Seeder;

class PenaltyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


	    $p = new Penalty();
	    $p->match_id = 1;
	    $p->player_id = 4;
	    $p->penalty_type_id = 1;
	    $p->save();

	    $p = new Penalty();
	    $p->match_id = 1;
	    $p->player_id = 15;
	    $p->penalty_type_id = 1;
	    $p->save();

	    $p = new Penalty();
	    $p->match_id = 1;
	    $p->player_id = 20;
	    $p->penalty_type_id = 1;
	    $p->save();

	    $p = new Penalty();
	    $p->match_id = 1;
	    $p->player_id = 7;
	    $p->penalty_type_id = 1;
	    $p->save();



    }
}
