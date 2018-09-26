<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{

    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        return (new MailMessage)
            ->greeting('Hola ' . $notifiable->name)

            ->subject('Solicitud de Reestablecimiento de Contraseña')
            //->subject(Lang::getFromJson('Reset Password Notification'))

            ->line('Recibis este email porque recibimos una petición de cambio de contraseña para tu cuenta.')
            //->line(Lang::getFromJson('You are receiving this email because we received a password reset request for your account.'))

            ->action('Reestrablecer Contraseña', url(config('app.url').route('password.reset', $this->token, false)))
            //->action(Lang::getFromJson('Reset Password'), url(config('app.url').route('password.reset', $this->token, false)))

            ->line('Si no realizaste esta petición, puedes ignorar este correo y nada habrá cambiado.')
            //->line(Lang::getFromJson('If you did not request a password reset, no further action is required.'));

            ->salutation('Saludos!');
    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }

}


/**<?php

namespace Illuminate\Auth\Notifications;

use Illuminate\Support\Facades\Lang;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
/**    use Queueable;

    /**
     * Create a new notification instance.
     *
/**     * @return void
     */
/**    public function __construct()
    {
        //
    }

     * Get the notification's delivery channels.
     *
/**  @param  mixed  $notifiable
     * @return array
     */
/**     public function via($notifiable)
   /**  {
      /**   return ['mail'];
  /**   }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
  /**   public function toMail($notifiable)
   /**  {
      /**   return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
  /**   public function toArray($notifiable)
  /**   {
     /**    return [
        /**     //
     /**    ];
  /**   }


/** }
