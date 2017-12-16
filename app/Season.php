<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{

	// Season hasmany matches
	public function matches()
	{
		return $this->hasMany(Match::class);
	}

	// Season and team: manytomany with pivots (standings)
	public function teams()
	{
		return $this->belongsToMany(Team::class)->withPivot('played', 'won', 'lost', 'draw');
	}

	/*
	 * Scopes
	 */
	public function scopeSeason($query, $seasonId = 1){
		return $query->where('season_id', $seasonId);
	}

	public function scopeCurrent($query){
		return $query->where('year_start','=', date('Y'));
	}




}
