<?php

namespace App\Listeners;

use App\Events\ResultEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendResultToStudent
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
     * @param  ResultEvent  $event
     * @return void
     */
    public function handle(ResultEvent $event)
    {
        //
    }
}
