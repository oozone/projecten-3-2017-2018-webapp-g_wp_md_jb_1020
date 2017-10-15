<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
	public function penaltybooks()
	{
		return $this->belongsToMany(PenaltyBook::class);
	}

	public function penaltytype()
	{
		return $this->belongsTo(PenaltyType::class);
	}
}
