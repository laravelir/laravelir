<?php

namespace App\Notifications\Shared\Package;

use App\Mail\Shared\NewPackageOrderEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class SendNewPackageOrderNotification extends Notification implements ShouldQueue
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
        $to = $this->details['customer']['email'];
        $detail = [
            'full_name' => $this->details['customer']['full_name'],
            'order_type' => $this->details['orderType'],
            'account_url' => $this->details['orderType'],
            'to' => 'user'
        ];
        return (new NewPackageOrderEmail($detail))->to($to);
    }

    public function toSMS($notifiable)
    {
        $message = '';
        return ['receptor' => $notifiable->mobile, 'message' => $message];
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
