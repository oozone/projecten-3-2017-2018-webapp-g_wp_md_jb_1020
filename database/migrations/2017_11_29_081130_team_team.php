<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TeamTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('team_team', function(Blueprint $table) {
		    $table->increments('id');
		    $table->integer('related_id')->unsigned()->index();
		    $table->integer('team_id')->unsigned()->index();
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('team_team');
    }
}
