<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

	protected $with = array('division','coach', 'players');

	public function relatedTeams()
	{
		$friends = $this->belongsToMany(Team::class, 'team_team', 'team_id', 'related_id');
		return $friends;
	}

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

	public function addRelatedTeam($friend_id)
	{
		$this->relatedTeams()->attach($friend_id);   // add friend
		$friend = Team::find($friend_id);       // find your friend, and...
		$friend->relatedTeams()->attach($this->id);  // add yourself, too
	}
	public function removeRelatedTeam($friend_id)
	{
		$this->relatedTeams()->detach($friend_id);   // remove friend
		$friend = Team::find($friend_id);       // find your friend, and...
		$friend->relatedTeams()->detach($this->id);  // remove yourself, too
	}


}
