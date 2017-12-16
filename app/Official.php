<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Official extends Model
{

	// Official and match: manytomany
	public function matches()
	{
		return $this->belongsToMany(Match::class);
	}
}
