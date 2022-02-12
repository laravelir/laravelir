<?php

namespace App\Observers;

use App\Models\Freelancer;

class FreelancerObserver
{

     /**
      * Handle the freelancer "creating" event.
      *
      * @param  \App\Models\Freelancer  $freelancer
      * @return void
      */
     public function creating(Freelancer $freelancer)
     {
         $freelancer->username = $freelancer->generateUsername();
     }

    /**
     * Handle the Freelancer "created" event.
     *
     * @param  \App\Models\Freelancer  $freelancer
     * @return void
     */
    public function created(Freelancer $freelancer)
    {
        $freelancer->profile()->create([
            'freelancer_id' => $freelancer->id
        ]);

        $freelancer->legal()->create([
            'legalable_id' => $freelancer->id,
            'legalable_type' => Freelancer::class
        ]);

        $freelancer->wallet()->create([
            'walletable_id' => $freelancer->id,
            'walletable_type' => Freelancer::class
        ]);
    }

    /**
     * Handle the Freelancer "updated" event.
     *
     * @param  \App\Models\Freelancer  $freelancer
     * @return void
     */
    public function updated(Freelancer $freelancer)
    {
        //
    }

    /**
     * Handle the Freelancer "deleted" event.
     *
     * @param  \App\Models\Freelancer  $freelancer
     * @return void
     */
    public function deleted(Freelancer $freelancer)
    {
        //
    }

    /**
     * Handle the Freelancer "restored" event.
     *
     * @param  \App\Models\Freelancer  $freelancer
     * @return void
     */
    public function restored(Freelancer $freelancer)
    {
        //
    }

    /**
     * Handle the Freelancer "force deleted" event.
     *
     * @param  \App\Models\Freelancer  $freelancer
     * @return void
     */
    public function forceDeleted(Freelancer $freelancer)
    {
        //
    }
}
