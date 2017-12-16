<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{

	// Goal belongs to player
    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    // Goal belongs to match
    public function match()
    {
        return $this->belongsTo(Match::class);
    }

    // Goal belongs to team
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

}
