<?php

namespace App\Listeners;

use App\Events\MatchSigned;
use App\Mail\FinasheetEmail;
use App\Team;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TableRankingListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Updates the division standings after match ended
     *
     * @param  MatchSigned  $event
     * @return void
     */
    public function handle(MatchSigned $event)
    {
        $match = $event->match;

	    $home = Team::with('seasons')->find($match->home->id);
	    $visitor = Team::find($match->visitor->id);


		$seasonId = $match->season_id;


		if($match->score_home > $match->score_visitor){ // Home won

			$ranking = $home->seasons()->where('season_id', $seasonId)->first();
			$ranking->pivot->won += 1;
			$ranking->pivot->played += 1;
			$ranking->pivot->save();

			$ranking = $visitor->seasons()->where('season_id', $seasonId)->first();
			$ranking->pivot->lost += 1;
			$ranking->pivot->played += 1;
			$ranking->pivot->save();

		} elseif($match->score_home < $match->score_visitor){ // Visitors won

			$ranking = $home->seasons()->where('season_id', $seasonId)->first();
			$ranking->pivot->lost += 1;
			$ranking->pivot->played += 1;
			$ranking->pivot->save();

			$ranking = $visitor->seasons()->where('season_id', $seasonId)->first();
			$ranking->pivot->won += 1;
			$ranking->pivot->played += 1;
			$ranking->pivot->save();


		} else { // Draw

			$ranking = $home->seasons()->where('season_id', $seasonId)->first();
			$ranking->pivot->draw += 1;
			$ranking->pivot->played += 1;
			$ranking->pivot->save();

			$ranking = $visitor->seasons()->where('season_id', $seasonId)->first();
			$ranking->pivot->draw += 1;
			$ranking->pivot->played += 1;
			$ranking->pivot->save();

		}

    }
}
