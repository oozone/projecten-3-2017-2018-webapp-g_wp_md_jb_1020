<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quarter extends Model
{
	public function match()
	{
		return $this->belongsTo(Match::class);
	}
}
