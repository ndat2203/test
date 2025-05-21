<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $verify_url;

    public function __construct($verify_url)
    {
        $this->verify_url = $verify_url;
    }

    public function build()
    {
        return $this->subject('Xác minh email của bạn')
                    ->view('pages.mail.reverify_email')
                    ->with(['verify_url' => $this->verify_url]);
    }
}
