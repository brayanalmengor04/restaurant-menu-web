<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ActivationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $activationUrl;

    public function __construct($activationUrl)
    {
        $this->activationUrl = $activationUrl;
    }

    public function build()
    {
        return $this->view('email.activation')
                    ->with(['activationUrl' => $this->activationUrl]);
    }
}
