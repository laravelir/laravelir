<?php

namespace App\Notifications\Site\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\Site\Auth\Freelancer\ResetPasswordRequestMail;

class FreelancerResetPasswordRequestNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $token;

    protected $type;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $type)
    {
        $this->token = $token;
        $this->type = $type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // $channel = $this->type === 'email' ? ['mail'] : [SMSKavenegarChannel::class];

        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = route('freelancer.auth.password.reset', $this->token);

        return (new ResetPasswordRequestMail($url))->to($notifiable->email);
    }

    /**
     * Get the sms representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return SMSMessage
     */
    public function toSMS($notifiable)
    {
        return [
            'receptor' => $notifiable->phone,
            'message' => "پیام",
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
