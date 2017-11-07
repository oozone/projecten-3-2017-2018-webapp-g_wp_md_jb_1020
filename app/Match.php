<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{

	protected $with = array('home','visitor','location','valor','difficulty');

	public function users()
	{
		return $this->belongsToMany(User::class);
	}

	public function home(){
		return $this->belongsTo(Team::class);
	}

	public function visitor(){
		return $this->belongsTo(Team::class);
	}
//
//	public function teams()
//	{
//		return $this->belongsToMany(Team::class);
//	}

	public function officials()
	{
		return $this->belongsToMany(Official::class);
	}

	public function location()
	{
		return $this->belongsTo(Location::class);
	}

	public function valor()
	{
		return $this->belongsTo(Valor::class);
	}

	public function difficulty()
	{
		return $this->belongsTo(Difficulty::class);
	}

	public function quarters()
	{
		return $this->hasMany(Quarter::class);
	}

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

	public function penaltybooks()
	{
		return $this->hasMany(PenaltyBook::class);
	}


}
