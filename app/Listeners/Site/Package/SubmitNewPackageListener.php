<?php

namespace App\Listeners\Site\Package;

use App\Enum\PackageTypeEnum;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Events\Site\Package\SubmitNewPackageEvent;


class SubmitNewPackageListener implements ShouldQueue
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
    public function handle(SubmitNewPackageEvent $event)
    {
        Notification::send($event->details['customer'], new SendNewSeoPackageNotification($event->details));
        Notification::route('mail', conf('ADMIN_EMAIL'))->notify(new SendNewSeoPackageToAdminNotification($event->details));
    }
}
