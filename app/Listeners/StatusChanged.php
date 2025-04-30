<?php

namespace App\Listeners;

use App\Events\ChangeStatus;
use App\Notifications\StatusChangedNotify;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StatusChanged implements ShouldQueue
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
    public function handle(ChangeStatus $event): void
    {
        $event->user->user->notify(new StatusChangedNotify($event->user));
    }
}
