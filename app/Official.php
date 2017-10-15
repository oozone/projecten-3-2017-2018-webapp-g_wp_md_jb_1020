<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
	public function matches()
	{
		return $this->belongsToMany(Match::class);
	}
}
