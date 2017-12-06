<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminFailureTest extends DuskTestCase
{

	//use DatabaseTransactions;

	private $response;


	public function testAdminNoAccessGuest()
	{

		$this->browse(function (Browser $browser) {
			$browser
			        ->visit('http://voom.be:12005/admin/players')
			        ->assertSee('Login');
		});

	}

	public function testAdminNoAccessUser()
	{

		$this->browse(function (Browser $browser) {
			$browser->loginAs(User::find(1))
				->visit('http://voom.be:12005/admin/players')
				->assertSee('Login');
		});

	}






}
