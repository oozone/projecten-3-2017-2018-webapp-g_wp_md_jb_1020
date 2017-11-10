<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenaltyBook extends Model
{

	protected $with = array('penalties');

	public function penalties()
	{
		return $this->hasMany(Penalty::class);
	}




}
