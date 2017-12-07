<?php

namespace Tests\Browser;

use App\Location;
use App\Match;
use App\Player;
use App\Team;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminTest extends DuskTestCase
{

	//use DatabaseTransactions;

	private $response;

	/**
	 * @group formscheck
	 */
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
					->assertSee('Chris Bonheure');
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


	/**
	 * @group formscheck
	 */
	public function testAdminLocationsCreateForm(){
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

	/**
	 * @group formscheck
	 */
	public function testAdminLocationsEditForm(){

		$id = 1;

		$this->browse(function (Browser $browser) use ($id) {
			$browser->loginAs(2)
			        ->visit('http://voom.be:12005/admin/locations/'.$id.'/edit')
			        ->assertInputValue('.panel input[name="name"]', 'Piscine \'Les Dauphins\'')
			        ->type('city', 'tempcity')
			        ->press('Save')
					->visit('http://voom.be:12005/admin/locations/')
			        ->assertSee('tempcity')
			;

		});

		$loc = Location::find($id);
		$loc->city = 'Moeskroen';
		$loc->save();

	}


	/**
	 * @group formscheck
	 */
	public function testAdminTeamCreateForm(){
		$this->browse(function (Browser $browser) {
			$browser->loginAs(2)
			        ->visit('http://voom.be:12005/admin/teams/create')
			        ->assertSee('Name')
			        ->type('name', 'Tempteam')
			        ->select('division_id', 2)
			        ->type('coach', 'Tempcoach')
			        ->press('Save')
			        ->assertSee('Tempteam')
			;

		});

		$c = Coach::where('name','=','tempcoach')->first();
		$c->delete();

		$loc = Team::where('name','=','Tempteam')->first();
		$loc->delete();

	}

	/**
	 * @group formscheck
	 */
	public function testAdminTeamsEditForm(){

		$id = 1;

		$this->browse(function (Browser $browser) use ($id) {
			$browser->loginAs(2)
			        ->visit('http://voom.be:12005/admin/teams/'.$id.'/edit')
			        ->assertInputValue('.panel input[name="name"]', 'Moeskroen')
			        ->type('name', 'tempteam')
			        ->press('Save')
			        ->visit('http://voom.be:12005/admin/teams/')
			        ->assertSee('tempteam')
			;

		});

		$loc = Team::find($id);
		$loc->name = 'Moeskroen';
		$loc->save();

	}

	/**
	 * @group formscheck
	 */
	public function testAdminPlayerCreateForm(){

		$date = date('d/m/Y');

		$this->browse(function (Browser $browser) use ($date) {
			$browser->loginAs(2)
			        ->visit('http://voom.be:12005/admin/players/create')
			        ->assertSee('Name')
					->type('name', 'Tempplayer')
					->type('player_number', '55')
					//->type('date', $date)
					->keys('#date', '01032017')
					->select('division', 2)
					->select('starter', 1)
					->select('status', 1)
					->select('team', 1)
			        ->press('Save')
					->visit('http://voom.be:12005/admin/players?page=2')
			        ->assertSee('Tempplayer')
					//->assertSee('Mechelen')
					//->assertSee($date)
			;

		});

		$loc = Player::where('name','=',"Tempplayer")->first();
		//$loc->delete();

	}

	/**
	 * @group formscheck
	 */
	public function testAdminPlayersEditForm(){

		$id = 1;

		$this->browse(function (Browser $browser) use ($id) {
			$browser->loginAs(2)
			        ->visit('http://voom.be:12005/admin/players/'.$id.'/edit')
			        ->assertInputValue('.panel input[name="name"]', 'Chris Bonheure')
			        ->type('name', 'tempplayer')
			        ->press('Save')
			        ->visit('http://voom.be:12005/admin/players/')
			        ->assertSee('tempplayer')
			;

		});

		$loc = Player::find($id);
		$loc->name = 'Chris Bonheure';
		$loc->save();

	}


	/**
	 * @group formscheck
	 */
	public function testAdminMatchCreateForm(){

		$date = date('Y-m-d');

		$this->browse(function (Browser $browser) use ($date) {
			$browser->loginAs(2)
			        ->visit('http://voom.be:12005/admin/matches/create')
			        ->assertSee('Season')
				//->type('name', 'Tempteam')
				    ->select('season_id', 1)
			        ->select('home_id', 3)
			        ->select('visitor_id', 4)
				//->type('datum', $date)
				    ->select('division_id', 1)
			        ->select('location_id', 5)
			        ->select('valor_id', 1)
			        ->select('difficulty_id', 1)

			        ->press('Save')
			        ->assertSee('Doornik')
			        ->assertSee('Mechelen')
			        ->assertSee($date)
			;

		});

		$loc = Match::where('home_id','=',3)->first();
		$loc->delete();

	}


	/**
	 * @group formscheck
	 */
//	public function testAdminMatchEditForm(){
//
//		$id = 1;
//
//		$this->browse(function (Browser $browser) use ($id) {
//			$browser->loginAs(2)
//			        ->visit('http://voom.be:12005/admin/matches/'.$id.'/edit')
//			        ->assertSelected('select[name=home_id]', (string) 1)
//			        ->type('home_id', 7)
//			        ->press('Save')
//			        ->visit('http://voom.be:12005/admin/matches/')
//			        ->assertSee('Kortrijk')
//			;
//
//		});
//
//		$loc = Match::find($id);
//		$loc->home_id = 1;
//		$loc->save();
//
//	}






}
