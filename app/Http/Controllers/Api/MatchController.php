<?php

namespace App\Http\Controllers\Api;

use App\Commentary;
use App\Events\MatchSigned;
use App\Goal;
use App\Http\Controllers\Controller;
use App\Mail\FinasheetEmail;
use App\Match;
//use Barryvdh\DomPDF\PDF;
use App\Player;
use App\User;
use Exception;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class MatchController extends Controller
{
	/**
	 * Display a listing of the matches + location.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Match::with('location')->get();
	}

	/**
	 * Display a listing of active matches.
	 * @return mixed
	 */
	public function activeMatches(){
		return Match::notCancelled()
		            //->notEnded()
		            ->with('location')->get();
	}

	/**
	 * Show the form for creating a new match.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created match in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified match + matchdetail.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		// Load match with related data
		$match = Match::with(array('location', 'difficulty', 'valor','home','visitor'))->find($id);

		// Build up matchdetail
		// Collect all goals from match
		$goals = collect(Goal::where('match_id', '=', $id)->with('player')->get());

		// Collect all penalties from match
		$penaltybooks = collect($match->penalties()->with('player')->orderBy('created_at')->get());

		// Merge goals and penalties
		$matchdetail = $goals->merge($penaltybooks)->sortBy('created_at');

		// Sort by created_at
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
	 * Update the specified match in storage.
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
	 * Remove the specified match from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Start the specified match
	 * @param Request $request
	 * @param $id
	 */
	public function startMatch(Request $request, $id){

		$match = Match::findOrFail($id);
		$match->match_start = date('Y-m-d H:i:s');
		$match->save();
	}

	/**
	 * End the specified match
	 * @param Request $request
	 * @param $id
	 */
	public function endMatch(Request $request, $id){
		$match = Match::findOrFail($id);
		$match->match_end = date('Y-m-d H:i:s');
		$match->save();
	}

	/**
	 * Cancel the specified match
	 * @param Request $request
	 * @param $id
	 */
	public function cancelMatch(Request $request, $id){

		$match = Match::findOrFail($id);
		$match->cancelled = true;
		$match->save();

	}

	/**
	 * Sign and close the specified match
	 * @param Request $request
	 * @param $id
	 * @return Response
	 */
	public function signAndCloseMatch(Request $request, $id)
	{

		$validator = Validator::make($request->all(), [
			'email' => 'required',
			'password' => 'required',
		]);

		// validations fails, return the error messages in JSON format
		if ($validator->fails()) {
			return response()->json($validator->messages(), 422);
		}

		// Try to login with these credentials
		if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
		{
			$match = Match::findOrFail($id);
			$signer = User::where('email', $request->email)->firstOrFail();

			$match->signed = 1;
			$match->signer_id = $signer->id;
			$match->save();




			// dispatch event that match is signed
			event(new MatchSigned($match));

		} else { // Login failed, throw error
			abort(403, 'Not authorized');
		}

	}

	/**
	 * Add match commentary to specified match
	 * @param Request $request
	 * @param $id
	 */
	public function addCommentary(Request $request, $id){

		$match = Match::find($id);
		$this->validate($request, [
			'comment' => 'required'
		]);
		$commentary = new Commentary();
		$commentary->text = $request->comment;
		$match->commentaries()->save($commentary);

	}

	/**
	 * Generate FINA-sheet PDF for specified match
	 * @param $id
	 *
	 * @return mixed
	 */
	public function generatePdf($id){

		$match = Match::findOrFail($id);

		$foutenThuis = DB::table('penalty_books')
		                 ->selectRaw('player_id, players.name, count(penalties.id) as aantalfouten')
		                 ->join('penalties','penalty_books.id','=','penalties.penalty_book_id')
		                 ->join('players','player_id','=','players.id')
		                 ->where('players.team_id', '=', $match->home->id)
		                 ->orderBy('player_id', 'asc')
		                 ->groupBy('player_id')
		                 ->get();

		$foutenBezoeker = DB::table('penalty_books')
		                 ->selectRaw('player_id, players.name, count(penalties.id) as aantalfouten')
		                 ->join('penalties','penalty_books.id','=','penalties.penalty_book_id')
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

		return $pdf->download('finasheet.pdf');
	}

	/**
	 * Set list of starters
	 * @param Request $request
	 * @param $id
	 */
	public function setStarters(Request $request, $id){

		$starters = json_decode($request->getContent(), false);
		$players = $starters->starters;
		foreach($players as $p){
			$player = Player::find($p->player_id);
			$player->starter = $p->starter;
			$player->save();
		}

	}


}
