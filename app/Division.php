<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
	public function teams()
	{
		return $this->hasMany(Team::class);
	}

	public function matches()
	{
		return $this->hasMany(Match::class);
	}

}
