<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailTest4IMG extends Mailable {
	use Queueable, SerializesModels;

	public $data;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($dataObj) {
		$this->data = $dataObj;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this->view('emails.test')
			->with([
				'name'    => $this->data['name'],
				'content' => $this->data['content'],
			]);
	}
}
