<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BasicTest extends DuskTestCase
{

	//use DatabaseTransactions;

	private $response;

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testHomepage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://voom.be:12005/')
                    ->assertSee('Waterpolo')
                    ->assertSee('Moeskroen')
            ;
        });
    }

	public function testMatchPage()
	{
		$this->browse(function (Browser $browser) {
			$browser->visit('http://voom.be:12005/matches/1')
			        ->assertSee('Moeskroen')
			        ->assertSee('First division')
					->assertSee('Coach: Eerste coach')
					->assertSee('Chris Bonheure')
			;
		});
	}

	public function testTeamPage()
	{
		$this->browse(function (Browser $browser) {
			$browser->visit('http://voom.be:12005/teams/1')
			        ->assertSee('Moeskroen')
			        ->assertSee('Coach: Eerste coach')
			        ->assertSee('Chris Bonheure')
			;
		});
	}

	public function testPlayerPage()
	{
		$this->browse(function (Browser $browser) {
			$browser->visit('http://voom.be:12005/players/1')
			        ->assertSee('Moeskroen')
			        ->assertSee('Player number: 1')
			        ->assertSee('Chris Bonheure')
			;
		});
	}

	public function testLocationPage()
	{
		$this->browse(function (Browser $browser) {
			$browser->visit('http://voom.be:12005/locations/1')
			        ->assertSee('Piscine \'Les Dauphins\'')
			        ->assertSee('Zwembad Sportpunt')
			;
		});
	}

    public function testLogin(){
	    $user = factory(User::class)->create([
	    	'name' => 'Taylor',
		    'email' => 'taylor@laravel.com',
		    //'password' => 'secret'
	    ]);

	    $this->browse(function ($browser) use ($user) {
		    $this->response = $browser->visit('http://voom.be:12005/login')
		            ->type('email', $user->email)
		            ->type('password', 'secret')
		            ->press('Login');


	    });

	    $this->response->assertSee('Taylor');

	    $taylor = User::where('name','=','Taylor')->first();
	    $taylor->delete();

    }
}
