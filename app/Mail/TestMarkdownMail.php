<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMarkdownMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userData;

    public $url = "http://127.0.0.1:8000/";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        //

        $this->userData = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("w.nassurally@gmail.com")->subject("Mon objet")
        ->markdown('emails.markdown-test');
    }
}
