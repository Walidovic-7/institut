<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Application $application) {}

    public function build()
    {
        return $this->subject('Candidature reçue')
            ->view('emails.application_received');
    }
}
