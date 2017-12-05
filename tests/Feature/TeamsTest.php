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

		$this->assertEquals($response->name, "Moeskroen");
		$this->assertEquals($response->division->name, "First division");
		$this->assertEquals($response->coach->name, "Eerste coach");
	}

	public function testAllPlayersFromTeamTest(){

		$response = json_decode($this->get('/api/teams/1/allplayers')
		                             ->assertStatus(200)
		                             ->assertJsonStructure([
			                             '*' => [
				                             'id',
				                             'player_number',
				                             'name',
				                             'birthdate',
				                             'status',
				                             //'team',
			                             ]
			                             //'team',
		                             ])->getContent());

		$this->assertGreaterThanOrEqual(10, count($response));
	}


}
