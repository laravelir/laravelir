<?php

namespace App\Notifications\Site;

use App\Mail\Site\WelcomeEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class SendWelcomeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $userType;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($userType)
    {
        $this->userType = $userType;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
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
        $detail = [
            'type'      => $this->userType,
            'full_name' => $notifiable->full_name,
            'username' => $notifiable->username,
        ];
        return (new WelcomeEmail($detail))->to($notifiable->email);
    }

    public function toSMS($notifiable)
    {
        $message = '';
        return ['receptor' => $notifiable->mobile, 'message' => $message];
    }

    public function toDatabase($notifiable)
    {
        return [
            //
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
