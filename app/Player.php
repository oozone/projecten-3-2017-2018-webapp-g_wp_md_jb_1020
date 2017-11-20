<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Mockery\Exception;

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

	/*
	 * Accessors
	 */
	public function getFormattedBirthdateAttribute()
	{
		try {
			$date = Carbon::createFromFormat('Y-m-d H:i:s', $this->birthdate)->format('d/m/Y');
		} catch(Exception $e){
			return "-";
		}

		return $date;
	}

}
