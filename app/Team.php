<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

	protected $with = array('division','coach', 'players');

	public function coach()
	{
		return $this->hasOne(Coach::class);
	}

	public function division()
	{
		return $this->belongsTo(Division::class);
	}

	public function players()
	{
		return $this->hasMany(Player::class);
	}

	public function matches()
	{
		return $this->belongsToMany(Match::class);
	}

	public function seasons()
	{
		return $this->belongsToMany(Season::class);
	}

	public function scopeDivision($query, $divisionId = 1){
		return $query->where('division_id', $divisionId);
	}

}
