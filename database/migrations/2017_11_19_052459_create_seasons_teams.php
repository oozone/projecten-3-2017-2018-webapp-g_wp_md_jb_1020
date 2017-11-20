<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeasonsTeams extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('season_team', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('season_id')->unsigned();
			$table->integer('team_id')->unsigned();
			$table->integer('played')->default(0);
			$table->integer('won')->default(0);
			$table->integer('lost')->default(0);
			$table->integer('draw')->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('season_team');
	}
}
