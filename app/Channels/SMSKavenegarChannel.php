<?php

namespace App\Channels;

use Exception;
use Kavenegar\KavenegarApi;
use Illuminate\Notifications\Notification;

class SMSKavenegarChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        if (!method_exists($notification, 'toSMS')) {
            throw new Exception('not found toSMS');
        }

        $sender = "10008663";
        $receptor = $notification->toSMS()['receptor'];
        $message = $notification->toSMS()['message'];

        try {
            $key = config('services.kavenegar.key');
            $api = new KavenegarApi($key);
            $api->Send($sender, $receptor, $message);
        } catch (\Kavenegar\Exceptions\ApiException $e) {
            throw $e->errorMessage();
        } catch (\Kavenegar\Exceptions\HttpException $e) {
            throw $e->errorMessage();
        }
    }
}
