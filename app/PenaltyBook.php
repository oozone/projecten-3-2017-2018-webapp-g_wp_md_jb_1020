<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenaltyBook extends Model
{
	public function penalties()
	{
		return $this->belongsToMany(Penalty::class);
	}
}
