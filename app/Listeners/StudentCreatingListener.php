<?php

namespace App\Listeners;

use App\Events\StudentCreatingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class StudentCreatingListener
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
     * @param  \App\Events\StudentCreatingEvent  $event
     * @return void
     */
    public function handle(StudentCreatingEvent $event)
    {
        Log::info('Student Creating Event Listener is fired '.$event->student);
    }
}
