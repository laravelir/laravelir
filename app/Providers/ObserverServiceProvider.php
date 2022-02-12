<?php

namespace App\Providers;

use App\Models\Freelancer;
use App\Models\User;
use App\Models\Ticket;
use App\Observers\FreelancerObserver;
use App\Observers\UserObserver;
use App\Observers\TicketObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Ticket::observe(TicketObserver::class);
        // Freelancer::observe(FreelancerObserver::class);
    }
}
