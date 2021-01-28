<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplayMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $poster;
    protected $text_replay;

    public function __construct($poster, $text_replay)
    {
        $this->poster = $poster;
        $this->text_replay = $text_replay;
        //dd($poster);
    }

    public function build()
    {
        
        return $this->markdown('messages.email.replay_message')->with([
            'poster' => $this->poster ,
            'text_replay' => $this->text_replay ,
        ]);
    }
}
