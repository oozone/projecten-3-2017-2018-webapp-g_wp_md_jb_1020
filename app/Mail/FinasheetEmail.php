<?php

namespace App\Mail;

use App\Match;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FinasheetEmail extends Mailable
{
	use Queueable, SerializesModels;

	public $match;
	public $referee;


	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(Match $match, User $referee)
	{
		$this->match = $match;
		$this->referee = $referee;

	}

	/**
	 * Build the FINA-sheet email
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this
			->subject("Finasheet: " . $this->match->home->name . ' - ' . $this->match->visitor->name)
			->markdown('mail.finasheet');
	}
}
