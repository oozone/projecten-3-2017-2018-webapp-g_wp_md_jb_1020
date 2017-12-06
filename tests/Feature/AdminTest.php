<?php

namespace Tests\Feature;

use App\User;
use App\UserRole;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{

	use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
	public function testApplication()
	{

		$this->get('/admin/players')
		        ->assertStatus(302)
				->assertSee("Redirecting to ");

		$user = User::find(2);
		$this->actingAs($user)
		     ->get('/admin/players')
		     ->assertStatus(200);
	}

	public function testLocationPostTest(){
		$user = User::find(2);
		$this->actingAs($user)
		     ->post('/admin/locations', [
				     'name' => "temp",
				     'street' => "tempstreet",
				     'postalcode' => "9000",
				     'city' => "tempcity",
				     "country" => "tempcountry"
			     ]
		     );

		$this->assertDatabaseHas('locations', [
			'name' => "temp",
			'street' => "tempstreet",
		]);
	}

	public function testLocationFailurePostTest(){
		$user = User::find(2);
		$this->actingAs($user)
		     ->post('/admin/locations', [
				     'street' => "tempstreet",
				     'postalcode' => "9000",
				     'city' => "tempcity",
				     "country" => "tempcountry"
			     ]
		     )
			->assertStatus(302)
		;

		$this->assertDatabaseMissing('locations', [
			'street' => "tempstreet",
		]);
	}

	public function testTeamPostTest(){
		$user = User::find(2);
		$this->actingAs($user)
		     ->post('/admin/teams', [
				     'name' => "tempteam",
				     'division_id' => 1,
				     'coach' => "tempcoach",
			     ]
		     )
		     ->assertStatus(302)
		;

		$this->assertDatabaseHas('coaches', [
			'name' => "tempcoach",
		]);

		$this->assertDatabaseHas('teams', [
			'name' => "tempteam",
			'division_id' => 1
		]);
	}

	public function testTeamPostFailureTest(){
		$user = User::find(2);
		$this->actingAs($user)
		     ->post('/admin/teams', [
				     'name' => "tempteam",
				     'division_id' => 1,
			     ]
		     )
		     ->assertStatus(302)
		;

		$this->assertDatabaseMissing('coaches', [
			'name' => "tempcoach",
		]);

		$this->assertDatabaseMissing('teams', [
			'name' => "tempteam",
			'division_id' => 1
		]);
	}

	public function testMatchPostTest(){
		$user = User::find(2);
		$this->actingAs($user)
		     ->post('/admin/matches', [
				     'season_id' => "tempteam",
				     'division_id' => 1,
				     'coach' => "tempcoach",
			     ]
		     )
		     ->assertStatus(302)
		;

		$this->assertDatabaseHas('coaches', [
			'name' => "tempcoach",
		]);

		$this->assertDatabaseHas('teams', [
			'name' => "tempteam",
			'division_id' => 1
		]);
	}



}
