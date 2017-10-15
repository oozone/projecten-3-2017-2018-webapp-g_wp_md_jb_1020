<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	public function matches()
	{
		return $this->hasMany(Match::class);
	}
}
