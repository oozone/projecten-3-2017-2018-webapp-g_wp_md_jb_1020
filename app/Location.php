<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	// Location hasmany matches
	public function matches()
	{
		return $this->hasMany(Match::class);
	}
}
