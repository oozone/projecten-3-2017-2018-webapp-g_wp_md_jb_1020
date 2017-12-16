<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model
{
	// Difficulty hasmany matches
	public function matches()
	{
		return $this->hasMany(Match::class);
	}
}
