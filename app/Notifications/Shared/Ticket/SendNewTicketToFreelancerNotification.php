<?php

namespace App\Notifications\Shared\Ticket;

use App\Mail\Shared\Ticket\SendNewTicketEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class SendNewTicketToFreelancerNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $details;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
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
        $to = $this->details['user']['email'];

        return (new SendNewTicketEmail($this->details))->to($to);
    }

    public function toSMS($notifiable)
    {
        $message = '';
        return ['receptor' => $notifiable->mobile, 'message' => $message];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => '',
            'url'   => '',
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
