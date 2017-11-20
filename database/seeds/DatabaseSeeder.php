<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);


	    $this->call(DifficultyTableSeeder::class);
	    $this->call(DivisionTableSeeder::class);
	    $this->call(LocationTableSeeder::class);
	    $this->call(ValorTableSeeder::class);

	    // Users
	    $this->call(RoleTableSeeder::class);
	    $this->call(UserTableSeeder::class);


	    // Seasons
	    $this->call(SeasonTableSeeder::class);

	    $this->call(CoachTableSeeder::class);
	    // Teams
	    $this->call(TeamTableSeeder::class);

	    // Coaches & players

	    $this->call(PlayerTableSeeder::class);

	    // Matches
	    $this->call(MatchTableSeeder::class);
	    $this->call(GoalTableSeeder::class);
	    $this->call(PenaltyTableSeeder::class);

    }
}
