<?php
/**
 * Created by PhpStorm.
 * User: Matthias
 * Date: 28/10/2017
 * Time: 18:44
 */

namespace Tests\Feature;

use App\Goal;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GoalTest extends TestCase {

	use DatabaseTransactions;

	public function testPostGoalTest(){

		$response = $this->json('POST', '/api/goals', [
			'match_id' => 1,
		    'player_id' => 15,
		    'quarter' => 1,
		    'team_id' => 1
			]
		);

		$this->assertDatabaseHas('goals', [
			'match_id' => 1,
			'player_id' => 15,
			'quarter' => 1
		]);

	}


}
