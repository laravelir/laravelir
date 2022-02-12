<?php

namespace App\Channels;

use Exception;
use Illuminate\Notifications\Notification;

class SMSGasedakChannel
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

        if(! method_exists($notification, 'toSMS')) {
            throw new Exception('not found toSMS');
        }

        $message = $notification->toSMS()['message'];
        $receptor = $notification->toSMS()['receptor'];

        try{
            $lineNumber = "";
            $api = new GhasedakApi("");
            $api->SendSimple($receptor, $message, $lineNumber);
        } catch(ApiException $e) {
            throw $e->errorMessage();
        } catch(HttpException $e) {
            throw $e->errorMessage();
        }

    }
}
