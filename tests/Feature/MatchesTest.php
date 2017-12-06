<?php
/**
 * Created by PhpStorm.
 * User: Matthias
 * Date: 28/10/2017
 * Time: 18:44
 */

namespace Tests\Feature;

use App\Match;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MatchesTest extends TestCase {

	use DatabaseTransactions;

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

		$this->assertEquals($response->home->name, "Moeskroen");
		$this->assertEquals($response->visitor->name, "Antwerpen");
		$this->assertEquals($response->location->name, "Piscine 'Les Dauphins'");
	}



	public function testStartMatchTest(){

		$response = $this->json('PUT', '/api/matches/1/start', [
			]
		);

		$match = Match::first();

		$this->assertNotNull($match->match_start);

		$match->match_start = null;
		$match->save();

	}

	public function testEndMatchTest(){

		$response = $this->json('PUT', '/api/matches/1/end', [
			]
		);

		$match = Match::first();

		$this->assertNotNull($match->match_end);

		$match->match_end = null;
		$match->save();

	}

	public function testCancelMatchTest(){

		$response = $this->json('PUT', '/api/matches/1/cancel', [
			]
		);

		$match = Match::first();

		$this->assertEquals($match->cancelled, 1);

		$match->cancelled = 0;
		$match->save();

	}


}
