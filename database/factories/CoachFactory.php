<?php

use Faker\Generator as Faker;

$factory->define(App\Coach::class, function (Faker $faker) {
	return [
		'name' => $faker->name,
		'team_id' => function () {
			return factory(App\Match::class)->create()->id;
		}
	];
});
