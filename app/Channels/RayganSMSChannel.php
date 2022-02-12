<?php

namespace App\Channels;

use Exception;
use Illuminate\Notifications\Notification;

class RayganSMSChannel
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

        $receptor = $notification->toSMS()['receptor'];
        $message = $notification->toSMS()['message'];

        return $this->SendOTP($receptor, $message);
    }

    private function SendOTP($receptor, $code)
    {
        $url = "http://smspanel.Trez.ir/SendMessageWithCode.ashx";

        $message = <<<MESSAGE
            کد فعال سازی شما:
            $code
            rasadm.com
        MESSAGE;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt(
            $ch,
            CURLOPT_POSTFIELDS,
            http_build_query(array(
                'Username' => "alij26t",
                'Password' => "5859001324",
                'Mobile' => $receptor,
                'Message' => $message
            ))
        );

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close($ch);
        return $server_output;
    }
}
