<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenaltyBook extends Model
{

	protected $with = array('penalties', 'player');

	public function penalties()
	{
		return $this->hasMany(Penalty::class);
	}

	public function player(){
		return $this->belongsTo(Player::class);
	}




}
