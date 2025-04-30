<?php

namespace App\Listeners;

use App\Events\SubmittedApplication;
use App\Notifications\ApplicationSubmitteNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ApplicationSubmitted implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    use InteractsWithQueue;
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SubmittedApplication $event): void
    {
        $event->application->user->notify(new ApplicationSubmitteNotification($event->application));


        $event->job->user->notify(new ApplicationSubmitteNotification($event->application));
    }
    
}
