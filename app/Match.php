<?php

namespace App;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{

	protected $with = array('home','visitor','location','valor','difficulty','goals','goals.player','commentaries','division');

	protected $dates = ['datum'];

	// Match and User: manytomany
	public function users()
	{
		return $this->belongsToMany(User::class);
	}

	// setup home and visitor
	public function home(){
		return $this->belongsTo(Team::class);
	}

	public function visitor(){
		return $this->belongsTo(Team::class);
	}

	// Match belongs to division
	public function division(){
		return $this->belongsTo(Division::class);
	}

	// Match and Official: manytomany
	public function officials()
	{
		return $this->belongsToMany(Official::class);
	}

	// Match belongs to a location
	public function location()
	{
		return $this->belongsTo(Location::class);
	}

	// Match hasmany quarters
	public function quarters()
	{
		return $this->hasMany(Quarter::class);
	}

	// Match hopefully hasmany goals
    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    // Match hasmany penalties
	public function penalties(){
		return $this->hasMany(Penalty::class);
	}

	// Match belongs to season
	public function season()
	{
		return $this->belongsTo(Season::class);
	}

	// Match hasmany admin commentaries
	public function commentaries(){
		return $this->hasMany(Commentary::class);
	}

	public function valor()
	{
		return $this->belongsTo(Valor::class);
	}

	public function difficulty()
	{
		return $this->belongsTo(Difficulty::class);
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
