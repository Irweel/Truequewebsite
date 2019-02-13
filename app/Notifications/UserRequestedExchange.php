<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;

class UserRequestedExchange extends Notification
{
    use Queueable;

    protected $exchange;
    protected $userTo;
    protected $compTomName;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($exchange,$compTomName)
    {
        $this->exchange = $exchange;
        $this->compTomName = $compTomName;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {

        return [
            'exchange'=>$this->exchange,
            'compTomName'=>$this->compTomName,
            'user'=>$notifiable
        ];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    
}
