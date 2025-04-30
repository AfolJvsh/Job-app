<?php

namespace App\Listeners;

use App\Events\RegisteredUser;
use App\Notifications\UserRegisteredNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserRegistration implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RegisteredUser $event): void
    {
        $event->user->user->notify(new UserRegisteredNotification($event->user));
    
    }
}
