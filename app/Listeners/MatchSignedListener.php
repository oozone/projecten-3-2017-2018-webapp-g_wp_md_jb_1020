<?php

namespace App\Listeners;

use App\Events\MatchSigned;
use App\Mail\FinasheetEmail;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MatchSignedListener
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
     * Generates FINA-sheet and mails it after match ended
     *
     * @param  MatchSigned  $event
     * @return void
     */
    public function handle(MatchSigned $event)
    {
        $match = $event->match;

	    // Setup the FINA-sheet
	    // ---------------------

	    $playersScorePerQuarterArray = [];
	    // Home Scored goals per quarter
	    foreach($match->home->players as $index => $h) {
		    $playersScorePerQuarterArray["home"][ $h->id ]['quartergoals'] = [];
		    $tmp = DB::table( 'goals' )->selectRaw( 'quarter' )->where( 'player_id', '=', $h->id )->get()->toArray();
		    if(empty($tmp)) {
			    continue;
		    }
		    foreach ( $tmp as $index2 => $t ) {
			    if ( count( $t->quarter ) < 1 ) {
				    $playersScorePerQuarterArray["home"][ $h->id ]['quartergoals'] = [];
				    continue;
			    } else {
				    // niet opgeteld, toevoegen
				    if(!empty($playersScorePerQuarterArray["home"][ $h->id ]['quartergoals'][ $t->quarter ]))
					    $playersScorePerQuarterArray["home"][ $h->id ]['quartergoals'][ $t->quarter ] = $playersScorePerQuarterArray["home"][ $h->id ]['quartergoals'][ $t->quarter ] + 1;
				    else {
					    $playersScorePerQuarterArray["home"][ $h->id ]['quartergoals'][ $t->quarter ] = 1;
				    }
			    }
		    }
	    }

	    // Visitor Scored goals per quarter
	    foreach($match->visitor->players as $index => $h) {
		    $playersScorePerQuarterArray["visitor"][ $h->id ]['quartergoals'] = [];
		    $tmp = DB::table( 'goals' )->selectRaw( 'quarter' )->where( 'player_id', '=', $h->id )->get()->toArray();
		    if(empty($tmp)) {
			    continue;
		    }
		    foreach ( $tmp as $index2 => $t ) {
			    if ( count( $t->quarter ) < 1 ) {
				    $playersScorePerQuarterArray["visitor"][ $h->id ]['quartergoals'] = [];
				    continue;
			    } else {
				    // niet opgeteld, toevoegen
				    if(!empty($playersScorePerQuarterArray["visitor"][ $h->id ]['quartergoals'][ $t->quarter ]))
					    $playersScorePerQuarterArray["visitor"][ $h->id ]['quartergoals'][ $t->quarter ] = $playersScorePerQuarterArray["visitor"][ $h->id ]['quartergoals'][ $t->quarter ] + 1;
				    else {
					    $playersScorePerQuarterArray["visitor"][ $h->id ]['quartergoals'][ $t->quarter ] = 1;
				    }
			    }
		    }
	    }

		// Fouten van thuisspelers
	    $foutenThuis = DB::table('penalties')
	                     ->selectRaw('player_id, players.name, count(penalties.id) as aantalfouten')
	                     ->join('players','player_id','=','players.id')
	                     ->where('players.team_id', '=', $match->home->id)
	                     ->orderBy('player_id', 'asc')
	                     ->groupBy('player_id')
	                     ->get();

	    // Fouten van bezoekers
	    $foutenBezoeker = DB::table('penalties')
	                        ->selectRaw('player_id, players.name, count(penalties.id) as aantalfouten')
	                        ->join('players','player_id','=','players.id')
	                        ->where('players.team_id', '=', $match->visitor->id)
	                        ->orderBy('player_id', 'asc')
	                        ->groupBy('player_id')
	                        ->get();

	    // Get important users
	    $referee = User::findOrFail($match->signer_id);

	    // Generate our pdf, A4 landscape mode
	    $pdf = PDF::loadView('pdf.finasheet', array(
		    'match' => $match,
		    'foutenThuis' => $foutenThuis,
		    'foutenBezoeker' => $foutenBezoeker,
		    'referee' => $referee,
		    'scorersPerQuarter' => $playersScorePerQuarterArray
	    ))->setPaper('a4', 'landscape');


	    // Save the pdf to disk
		$filename = 'finasheet-'. time() . '.pdf';
	    $pdf->save(public_path('pdf/' . $filename));

	    $match->finasheet = $filename;


	    // Send the fina sheet email to the referee
	    Mail::to("matthias.vanooteghem@gmail.com")->send(new FinasheetEmail($match, $referee));
	    //Mail::to($referee->email)->send(new FinasheetEmail($match, $referee));

	    if(isset($match->lector)){
		    Mail::to($match->lector)->send(new FinasheetEmail($match, $referee));
		    unset($match->lector);
	    }
	    $match->save();

    }
}
