<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationStatusChanged extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Application $application) {}

    public function build()
    {
        return $this->subject('Mise à jour de votre candidature')
            ->view('emails.application_status_changed');
    }
}
