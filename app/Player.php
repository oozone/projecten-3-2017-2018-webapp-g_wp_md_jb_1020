<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

	//protected $with = array('team');

	public function team()
	{
		return $this->belongsTo(Team::class);
	}

	public function penaltybooks()
	{
		return $this->hasMany(PenaltyBook::class);
	}

	/*
	 * Scopes
	 */
	public function scopeActive($query){
		return $query->where('status', 1);
	}


}
