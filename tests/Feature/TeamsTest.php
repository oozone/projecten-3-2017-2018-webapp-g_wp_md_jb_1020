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

class TeamsTest extends TestCase {

	public function testTeamsTest(){
		$this->get('/api/teams')
		     ->assertStatus(200)
		     ->assertJsonStructure([
			     '*' => [
				     'id',
				     'name',
				     'division',
				     'coach',
				     'players',
			     ]
		     ]);
	}

	public function testMatchTest(){

		$response = json_decode(
			$this->json('GET', '/api/teams/1' )
			     ->assertStatus(200)
			     ->getContent()
		);

		$this->assertEquals($response->name, "Gentse WPC");
		$this->assertEquals($response->division->name, "Eerste klasse");
		$this->assertEquals($response->coach->name, "Eerste coach");
	}


}
