<?php

namespace App\Listeners;

use App\Events\NewCourseSubscription;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\SendCourseNotification;

class SendNewCourseSubscriptionNotification
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
     * @param  NewCourseSubscription  $event
     * @return void
     */
    public function handle(NewCourseSubscription $event)
    {
        
        $details = ['event' => $event->subscription];
        SendCourseNotification::dispatch($details);
    }
}
