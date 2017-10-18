<?php

use App\Valor;
use Illuminate\Database\Seeder;

class ValorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	// name

	    $valor = new Valor();
	    $valor->name = "Eerste valor";
	    $valor->save();


    }
}
