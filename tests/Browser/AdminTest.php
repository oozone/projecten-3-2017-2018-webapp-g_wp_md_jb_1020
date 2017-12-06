<?php

namespace Tests\Browser;

use App\Location;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminTest extends DuskTestCase
{

	//use DatabaseTransactions;

	private $response;

	public function testAdminPlayers()
	{

		$matthias = User::where('name','=','Matthias')->first();

		$this->browse(function ($first, $second) use($matthias) {
			$first->loginAs(2)
					->visit('http://voom.be:12005/login')
					->type('email', $matthias->email)
					->type('password', 'secret')
					->press('Login')
			        ->visit('http://voom.be:12005/admin/players')
				    ->assertSee('Players')
					->assertSee('Create')
					->assertSee('Christof de Bonheure');
		});

	}

	public function testAdminLocations(){
		$this->browse(function ($first, $second) {
			$first->loginAs(2)
			      ->visit('http://voom.be:12005/admin/locations')
			      ->assertSee('Locations')
			      ->assertSee('Piscine \'Les Dauphins\'');
		});
	}

	public function testTeamLocations(){
		$this->browse(function ($first, $second) {
			$first->loginAs(2)
			      ->visit('http://voom.be:12005/admin/teams')
			      ->assertSee('Teams')
			      ->assertSee('Moeskroen');
		});
	}

	public function testAdminMatches(){
		$this->browse(function ($first, $second) {
			$first->loginAs(2)
			      ->visit('http://voom.be:12005/admin/matches')
			      ->assertSee('Matches')
			      ->assertSee('Moeskroen')
			      ->assertSee('Antwerpen');
		});
	}

	public function testAdminLocationsForm(){
		$this->browse(function (Browser $browser) {
			$browser->loginAs(2)
			        ->visit('http://voom.be:12005/admin/locations/create')
			        ->assertSee('Name')
			        ->type('name', 'Templocation')
					->type('street', 'Tempstreet')
					->type('postalcode', '9000')
				->type('city', 'Tempcity')
				->type('country', 'Tempcountry')
				->press('Save')
				->assertSee('Templocation')
				;

		});

		$loc = Location::where('name','=','Templocation')->first();
		$loc->delete();

	}







}
