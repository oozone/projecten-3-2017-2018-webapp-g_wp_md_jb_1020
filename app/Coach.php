<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Coach extends Model
{

	// Coach belongs to team
	public function team()
	{
		return $this->belongsTo(Team::class);
	}
}
