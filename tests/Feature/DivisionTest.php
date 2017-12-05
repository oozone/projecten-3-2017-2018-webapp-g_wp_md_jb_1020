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

class DivisionTest extends TestCase {

	public function testDivisionsTest(){
		$this->get('/api/divisions')
		     ->assertStatus(200)
		     ->assertJsonStructure([
			     '*' => [
				     'id',
				     'name',
				     'period_length',
			     ]
		     ]);
	}

	public function testDivisionTest(){

		$response = json_decode(
			$this->json('GET', '/api/divisions/1' )
			     ->assertStatus(200)
			     ->getContent()
		);

		$this->assertEquals($response->name, "First division");
		$this->assertEquals($response->period_length, "08:00:00");
		$this->assertEquals($response->teams[0]->name, "Moeskroen");
	}


}
