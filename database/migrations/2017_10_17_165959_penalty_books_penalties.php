<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PenaltyBooksPenalties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('penalty_books_penalties', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('penalty_book_id')->unsigned();
			$table->integer('penalty_id')->unsigned();
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
		Schema::dropIfExists('penalty_books_penalties');
	}
}
