<?php

namespace App\Listeners;

use App\Events\MatchSigned;
use App\Mail\FinasheetEmail;
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
     * Handle the event.
     *
     * @param  MatchSigned  $event
     * @return void
     */
    public function handle(MatchSigned $event)
    {
        $match = $event->match;

	    $foutenThuis = DB::table('penalties')
	                     ->selectRaw('player_id, players.name, count(penalties.id) as aantalfouten')
	                     //->join('penalties','penalty_books.id','=','penalties.penalty_book_id')
	                     ->join('players','player_id','=','players.id')
	                     ->where('players.team_id', '=', $match->home->id)
	                     ->orderBy('player_id', 'asc')
	                     ->groupBy('player_id')
	                     ->get();

	    $foutenBezoeker = DB::table('penalties')
	                        ->selectRaw('player_id, players.name, count(penalties.id) as aantalfouten')
	                        //->join('penalties','penalty_books.id','=','penalties.penalty_book_id')
	                        ->join('players','player_id','=','players.id')
	                        ->where('players.team_id', '=', $match->visitor->id)
	                        ->orderBy('player_id', 'asc')
	                        ->groupBy('player_id')
	                        ->get();

	    $pdf = PDF::loadView('pdf.finasheet', array(
		    'match' => $match,
		    'foutenThuis' => $foutenThuis,
		    'foutenBezoeker' => $foutenBezoeker
	    ))->setPaper('a4', 'landscape');


		$filename = 'finasheet-'. time() . '.pdf';

	    $pdf->save(public_path('pdf/' . $filename));

	    $match->finasheet = $filename;
	    $match->save();

	    Mail::to("matthias.vanooteghem@gmail.com")->send(new FinasheetEmail($match));



    }
}
