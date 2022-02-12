<?php

namespace App\Listeners\Shared\Ticket;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Events\Shared\Ticket\SendNewTicketEvent;
use App\Notifications\Shared\Ticket\SendNewTicketToUserNotification;
use App\Notifications\Shared\Ticket\SendNewTicketToAdminNotification;
use App\Notifications\Shared\Ticket\SendNewTicketToFreelancerNotification;

class SendNewTicketListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(SendNewTicketEvent $event)
    {
        if ($event->details['user_type'] === 'user')
            Notification::send($event->details['user'], new SendNewTicketToUserNotification($event->details));

        if ($event->details['user_type'] === 'freelancer')
            Notification::send($event->details['user'], new SendNewTicketToFreelancerNotification($event->details));

        Notification::route('mail', conf('ADMIN_EMAIL'))->notify(new SendNewTicketToAdminNotification($event->details));
    }
}
