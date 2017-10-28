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

class MatchesTest extends TestCase {

	public function testMatchesTest(){
		$this->get('/api/matches')
		     ->assertStatus(200)
		     ->assertJsonStructure([
			     '*' => [
				     'id',
				     'home',
				     'visitor',
				     'location',
				     'valor',
				     'difficulty'
			     ]
		     ]);
	}

	public function testMatchTest(){

		$response = json_decode(
			$this->json('GET', '/api/matches/1' )
			     ->assertStatus(200)
			     ->getContent()
		);

		$this->assertEquals($response->home->name, "Gentse WPC");
		$this->assertEquals($response->visitor->name, "Aalst");
		$this->assertEquals($response->location->name, "Strop");
	}


}
