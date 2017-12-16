<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{

	//protected $with = array('penaltytype');

	// Penalty belongs to player
	public function player()
	{
		return $this->belongsTo(Player::class);
	}

	// Penalty belongs to penaltytype
	public function penaltytype()
	{
		return $this->belongsTo(PenaltyType::class);
	}


}
