<?php

namespace App;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{

	protected $with = array('home','visitor','location','valor','difficulty','goals','goals.player','commentaries','division');

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

	public function division(){
		return $this->belongsTo(Division::class);
	}

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

	public function penalties(){
		return $this->hasMany(Penalty::class);
	}

	public function season()
	{
		return $this->belongsTo(Season::class);
	}

	public function commentaries(){
		return $this->hasMany(Commentary::class);
	}


	/*
	 * Scopes
	 */
	public function scopeNotCancelled($query){
		return $query->where('cancelled', '=', 0);
	}

	public function scopeNotEnded($query){
		return $query->where('match_end', '=', null);
	}

	/*
	 * Accessors
	 */
	public function getFormattedDateAttribute()
	{
		try {
			$date = Carbon::createFromFormat('Y-m-d H:i:s', $this->datum)->format('d/m/Y H:i');
		} catch(Exception $e){
			return "-";
		}

		return $date;
	}


}
