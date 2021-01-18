<?php

namespace App\Observers;

use App\Models\Episode;

class EpisodeObserver
{
    /**
     * Handle the episode "creating" event.
     *
     * @param  \App\Models\Episode  $episode
     * @return void
     */
    public function creating(Episode $episode)
    {
        $episode->slug = $episode->anime->slug . '-' . $episode->slug;
    }

    /**
     * Handle the episode "updating" event.
     *
     * @param  \App\Models\Episode  $episode
     * @return void
     */
    public function updating(Episode $episode)
    {
        $episode->slug = $episode->anime->slug . '-' . $episode->slug;
    }

    /**
     * Handle the episode "created" event.
     *
     * @param  \App\Models\Episode  $episode
     * @return void
     */
    public function created(Episode $episode)
    {
        
    }

    /**
     * Handle the episode "updated" event.
     *
     * @param  \App\Models\Episode  $episode
     * @return void
     */
    public function updated(Episode $episode)
    {

    }

    /**
     * Handle the episode "deleted" event.
     *
     * @param  \App\Models\Episode  $episode
     * @return void
     */
    public function deleted(Episode $episode)
    {
        //
    }

    /**
     * Handle the episode "restored" event.
     *
     * @param  \App\Models\Episode  $episode
     * @return void
     */
    public function restored(Episode $episode)
    {
        //
    }

    /**
     * Handle the episode "force deleted" event.
     *
     * @param  \App\Models\Episode  $episode
     * @return void
     */
    public function forceDeleted(Episode $episode)
    {
        //
    }
}
