<?php

namespace App\Mail;

use App\Match;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FinasheetEmail extends Mailable
{
	use Queueable, SerializesModels;

	public $match;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(Match $match)
	{
		$this->match = $match;
	}

	/**
	 * Build the message.
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
