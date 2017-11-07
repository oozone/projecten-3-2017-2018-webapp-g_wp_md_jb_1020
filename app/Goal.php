<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function match()
    {
        return $this->belongsTo(Match::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

}
