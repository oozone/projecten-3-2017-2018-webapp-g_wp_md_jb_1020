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

class PlayersTest extends TestCase {

	public function testPlayersTest(){
		$this->get('/api/players')
		     ->assertStatus(200)
		     ->assertJsonStructure([
			     '*' => [
				     'id',
				     'player_number',
				     'name',
				     'birthdate',
				     'status',
				     'team',
			     ]
		     ]);
	}

	public function testPlayerTest(){

		$response = json_decode(
			$this->json('GET', '/api/players/1' )
			     ->assertStatus(200)
			     ->getContent()
		);

		$this->assertEquals($response->name, "Christof de Bonheure");
		$this->assertEquals($response->player_number, 5);
		$this->assertEquals($response->birthdate, "1984-03-27 00:00:00");
		$this->assertEquals($response->status, 1);
		$this->assertEquals($response->team->name, "Gentse WPC");
	}


}
