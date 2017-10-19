<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valor extends Model
{
	public function matches()
	{
		return $this->hasMany(Match::class);
	}
}
