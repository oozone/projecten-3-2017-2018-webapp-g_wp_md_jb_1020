<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	public function coach()
	{
		return $this->hasOne(Coach::class);
	}
}
