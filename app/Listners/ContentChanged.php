<?php

namespace App\Listners;

use App\Events\ContentUpdated;

class ContentChanged
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
     * @param  \App\Events\ContentUpdated  $event
     * @return void
     */
    public function handle(ContentUpdated $event)
    {
        $item = $event->item;
        $item->content->updated_at = $item->updated_at;
        $item->content->save();
    }
}

