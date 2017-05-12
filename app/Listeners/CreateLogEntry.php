<?php

namespace Blog1\Listeners;

use Blog1\Events\QuoteCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Blog1\QuoteLog;

class CreateLogEntry
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
     * @param  QuoteCreated  $event
     * @return void
     */
    public function handle(QuoteCreated $event)
    {
        //$event object is used to get or recieve the event
        $author = $event->author_name;
        // updating the database
        $log_entry=new QuoteLog();
        $log_entry->author = $author;
        $log_entry->save();
    }
}
