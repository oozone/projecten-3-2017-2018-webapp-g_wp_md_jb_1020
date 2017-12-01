<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{

	//protected $with = array('penaltytype');

//	public function penaltybook()
//	{
//		return $this->belongsTo(PenaltyBook::class);
//	}

	public function player()
	{
		return $this->belongsTo(Player::class);
	}

	public function penaltytype()
	{
		return $this->belongsTo(PenaltyType::class);
	}


}
