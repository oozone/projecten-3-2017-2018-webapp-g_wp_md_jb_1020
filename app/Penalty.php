<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
	public function penaltybook()
	{
		return $this->belongsTo(PenaltyBook::class);
	}

	public function penaltytype()
	{
		return $this->belongsTo(PenaltyType::class);
	}
}
