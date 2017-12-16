<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{

	// Division hasmany teams
	public function teams()
	{
		return $this->hasMany(Team::class);
	}

	// Division hasmany players
	public function players()
	{
		return $this->hasMany(Player::class);
	}

	// Division hasmany matches
	public function matches()
	{
		return $this->hasMany(Match::class);
	}

}
