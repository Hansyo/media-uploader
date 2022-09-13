<?php

namespace App\Listners;

use App\Events\ContentDeleting;
use Exception;

class ContentRemoving
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
     * @param  \App\Events\ContentDeleting  $event
     * @return void
     */
    public function handle(ContentDeleting $event)
    {
        try {
            $event->item->content->delete();
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}

