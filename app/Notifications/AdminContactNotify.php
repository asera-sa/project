<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminContactNotify extends Notification
{
    use Queueable;

    public $message;
    public $title;
    public $content;

    public function __construct($message, $title, $content)
    {
        $this->message = $message;
        $this->title = $title;
        $this->content = $content;
    }

    public function via($notifiable)
    {
        return ['database'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => $this->message,
            'title' => $this->title,
            'content' => $this->content
        ];
    }

}
