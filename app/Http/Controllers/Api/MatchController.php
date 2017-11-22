<?php

namespace App\Http\Controllers\Api;

use App\Commentary;
use App\Goal;
use App\Http\Controllers\Controller;
use App\Match;
//use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class MatchController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Match::with('location')->get();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$match = Match::with(array('location', 'difficulty', 'valor','home','visitor','penaltybooks'))->find($id);

		$goals = collect(Goal::where('match_id', '=', 1)->with('player')->get());
		$penaltybooks = collect($match->penaltybooks()->with('player')->orderBy('created_at')->get());
		$matchdetail = $goals->merge($penaltybooks)->sortBy('created_at');

		$items = $matchdetail->all();
		usort($items, function($a, $b) {
			return $a->created_at <=> $b->created_at;
		});
		$sorted = collect($items);

		$matchArray = $match->toArray();
		$matchArray["matchdetail"] = $sorted;

		return $matchArray;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function startMatch($id){

		$match = Match::findOrFail($id);
		$match->match_start = date('Y-m-D H:i:s');
		$match->save();
	}

	public function endMatch($id){
		$match = Match::findOrFail($id);
		$match->match_end = date('Y-m-D H:i:s');
		$match->save();
	}


	public function generatePdf($id){

		$match = Match::findOrFail($id);

		//dd($match->home->team_id);

		$foutenThuis = DB::table('penalty_books')
		                 ->selectRaw('player_id, players.name, count(penalties.id) as aantalfouten')
		                 ->join('penalties','penalty_books.id','=','penalties.penalty_book_id')
		                 ->join('players','player_id','=','players.id')
//							->join('players', function ($join) use ($match) {
//								$join->on('player_id', '=', 'players.id')
//								     ->where('players.team_id', '=', $match->home->team_id);
//							})
		                 ->where('players.team_id', '=', $match->home->id)
		                 ->orderBy('player_id', 'asc')
		                 ->groupBy('player_id')
		                 ->get();

		$foutenBezoeker = DB::table('penalty_books')
		                 ->selectRaw('player_id, players.name, count(penalties.id) as aantalfouten')
		                 ->join('penalties','penalty_books.id','=','penalties.penalty_book_id')
		                 ->join('players','player_id','=','players.id')
//							->join('players', function ($join) use ($match) {
//								$join->on('player_id', '=', 'players.id')
//								     ->where('players.team_id', '=', $match->home->team_id);
//							})
                         ->where('players.team_id', '=', $match->visitor->id)
		                 ->orderBy('player_id', 'asc')
		                 ->groupBy('player_id')
		                 ->get();
		//dd($foutenBezoeker->toJSON());

		//dd($match->visitor->players->toJSON());
		$pdf = PDF::loadView('pdf.finasheet', array(
			'match' => $match,
			'foutenThuis' => $foutenThuis,
			'foutenBezoeker' => $foutenBezoeker
		))->setPaper('a4', 'landscape');
		return $pdf->download('finasheet.pdf');
//        return View::make('pdf.finasheet', array(
//        	'match' => $match,
//	        'foutenThuis' => $foutenThuis,
//	        'foutenBezoeker' => $foutenBezoeker
//        ));
	}

	public function addCommentary(Request $request, $id){



		$match = Match::find($id);

		//dd($request);

		$this->validate($request, [
			'comment' => 'required'
		]);


		$commentary = new Commentary();
		$commentary->text = $request->comment;
		$match->commentaries()->save($commentary);

	}


}
