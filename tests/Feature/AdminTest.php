<?php

namespace Tests\Feature;

use App\User;
use App\UserRole;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{

	//use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
	public function testApplication()
	{
//		$user = factory(User::class)->create();
//		$role = UserRole::where('user_role_id', 2)->first();
//		$user->roles()->save($role);


		$this->get('/admin/players')
		     ->assertStatus(302)
			->assertSee("Redirecting to ");

		$user = User::find(2);
		$this->actingAs($user)
		     //->withSession(['foo' => 'bar'])
		     ->get('/admin/players')
		     ->assertStatus(200);
	}



}
