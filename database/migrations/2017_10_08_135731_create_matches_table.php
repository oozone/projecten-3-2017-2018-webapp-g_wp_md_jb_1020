<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('division_id')->nullable();
            $table->integer('season_id')->nullable();
            $table->integer('location_id')->nullable();
            $table->integer('difficulty_id')->nullable();
            $table->integer('valor_id')->nullable();
            $table->integer('home_id')->nullable();
            $table->integer('visitor_id')->nullable();
            $table->integer('score_home')->default(0);
            $table->integer('score_visitor')->default(0);
            $table->datetime('datum')->nullable();
            $table->datetime('match_start')->nullable();
            $table->datetime('match_end')->nullable();
            $table->time('time_played')->default('00:00');
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
        Schema::dropIfExists('matches');
    }
}
