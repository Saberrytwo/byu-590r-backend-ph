<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CharactersPlayedList extends Mailable
{
use Queueable, SerializesModels;

protected $charactersPlayed;

/**
* Create a new message instance.
*
* @return void
*/
public function __construct($charactersPlayed)
{
$this->charactersPlayed = $charactersPlayed;
}

/**
* Get the message envelope.
*
* @return \Illuminate\Mail\Mailables\Envelope
*/
public function envelope()
{
return new Envelope(
subject: 'Characters Played Master List',
);
}

/**
* Get the message content definition.
*
* @return \Illuminate\Mail\Mailables\Content
*/
public function content()
{

return new Content(
view: 'characters-played-master-list',
with: [
'charactersPlayed' => $this->charactersPlayed
]
);
}

/**
* Get the attachments for the message.
*
* @return array
*/
public function attachments()
{
return [];
}
}