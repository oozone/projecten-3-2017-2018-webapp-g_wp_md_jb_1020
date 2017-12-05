<?php
/**
 * Created by PhpStorm.
 * User: Matthias
 * Date: 28/10/2017
 * Time: 18:44
 */

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LocationTest extends TestCase {

	public function testLocationsTest(){
		$this->get('/api/locations')
		     ->assertStatus(200)
		     ->assertJsonStructure([
			     '*' => [
				     'id',
				     'name',
				     'street',
				     'postalcode',
				     'city',
				     'country'
			     ]
		     ]);
	}

	public function testLocationTest(){

		$response = json_decode(
			$this->json('GET', '/api/locations/1' )
			     ->assertStatus(200)
			     ->getContent()
		);

		$this->assertEquals($response->name, "Piscine 'Les Dauphins'");
		$this->assertEquals($response->street, "Rue du Père Damien 2");
		$this->assertEquals($response->postalcode, "7700");
		$this->assertEquals($response->city, "Moeskroen");
		$this->assertEquals($response->country, "BE");
	}


}
