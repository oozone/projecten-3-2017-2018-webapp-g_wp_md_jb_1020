<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quarter extends Model
{

	// Quarter belongs to match
	public function match()
	{
		return $this->belongsTo(Match::class);
	}
}
