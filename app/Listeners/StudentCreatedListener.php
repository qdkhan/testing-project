<?php

namespace App\Listeners;

use App\Events\StudentCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class StudentCreatedListener
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
     * @param  \App\Events\StudentCreatedEvent  $event
     * @return void
     */
    public function handle(StudentCreatedEvent $event)
    {
        Log::info('Student Created Event Listener is fired '.$event->student);
    }
}
