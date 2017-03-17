<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailTestMarkdown extends Mailable {
	use Queueable, SerializesModels;

	public $data;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($data) {
		$this->data = $data;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		$email = $this->markdown('emails.testmarkdown')
			->subject($this->data['subject'])
			->with([
				'image' => $this->data['logoUrl'],
			]);
		foreach ($this->data['attachments'] as $filePath) {
			$email->attach($filePath);
		}

		return $email;
	}
}
