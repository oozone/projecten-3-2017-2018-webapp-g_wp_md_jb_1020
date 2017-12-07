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

		$date = date('Y-m-d H:i:s');

		$this->actingAs($user)
		     ->post('/admin/matches', [
				     'season_id' => 1,
				     'division_id' => 1,
				     'location_id' => 6,
				     'difficulty_id' => 1,
				     'valor_id' => 1,
				     'home_id' => 2,
				     'visitor_id' => 1,
				     'datum' => $date
			     ]
		     )
		     ->assertStatus(302)
		;

		$this->assertDatabaseHas('matches', [
			'home_id' => 2,
			'visitor_id' => 1,
			'datum' => $date
		]);

	}

	public function testMatchPostFailureTest(){
		$user = User::find(2);

		$date = date('Y-m-d H:i:s');

		$this->actingAs($user)
		     ->post('/admin/matches', [
				     'season_id' => 1,
				     'division_id' => 1,
				     'location_id' => 6,
				     'difficulty_id' => 1,
				     'valor_id' => 1,
				     //'home_id' => 2,
				     'visitor_id' => 1,
				     'datum' => $date
			     ]
		     )
		     ->assertStatus(302)
		;

		$this->assertDatabaseMissing('matches', [
			//'home_id' => 2,
			'visitor_id' => 1,
			'datum' => $date
		]);

	}


	public function testPlayerPostTest(){
		$user = User::find(2);

		$date = date('Y-m-d H:i:s');

		$this->actingAs($user)
		     ->post('/admin/players', [
				     'team' => 2,
		     	     'division_id' => 1,
				     'player_number' => 55,
				     'name' => "tempplayer",
				     'division' => 1,
				     'date' => $date,
				     'starter' => 1,
				     'status' => 1,
			     ]
		     )
		     ->assertStatus(302)
		;

		$this->assertDatabaseHas('players', [
			'name' => "tempplayer",
		]);

	}

	public function testPlayerFailurePostTest(){
		$user = User::find(2);

		$date = date('Y-m-d H:i:s');

		$this->actingAs($user)
		     ->post('/admin/players', [
				     //'team' => 2,
				     'division_id' => 1,
				     'player_number' => 55,
				     'name' => "tempplayer",
				     'date' => $date,
				     'starter' => 1,
				     'status' => 1,
			     ]
		     )
		     ->assertStatus(302)
		;

		$this->assertDatabaseMissing('players', [
			'name' => "tempplayer",
		]);

	}


}
