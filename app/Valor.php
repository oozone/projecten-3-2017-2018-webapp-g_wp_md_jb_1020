<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valor extends Model
{

	// Valor hasmany matches
	public function matches()
	{
		return $this->hasMany(Match::class);
	}
}
