<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

	protected $with = array('division','coach', 'players');

	// Team and Team: manytomany (related teams)
	public function relatedTeams()
	{
		$friends = $this->belongsToMany(Team::class, 'team_team', 'team_id', 'related_id');
		return $friends;
	}

	// Team hasone coach
	public function coach()
	{
		return $this->hasOne(Coach::class);
	}

	// Team belongsto division
	public function division()
	{
		return $this->belongsTo(Division::class);
	}

	// Team hasmany players
	public function players()
	{
		return $this->hasMany(Player::class);
	}

	// Team and match: manytomany
	public function matches()
	{
		return $this->belongsToMany(Match::class);
	}

	// Team and season: manytomany
	public function seasons()
	{
		return $this->belongsToMany(Season::class);
	}

	/*
	 * Scopes
	 */
	public function scopeDivision($query, $divisionId = 1){
		return $query->where('division_id', $divisionId);
	}

	/*
	 * Helper functions
	 */
	public function addRelatedTeam($friend_id)
	{
		$this->relatedTeams()->attach($friend_id);
		$friend = Team::find($friend_id);
		$friend->relatedTeams()->attach($this->id);
	}
	public function removeRelatedTeam($friend_id)
	{
		$this->relatedTeams()->detach($friend_id);
		$friend = Team::find($friend_id);
		$friend->relatedTeams()->detach($this->id);
	}


}
