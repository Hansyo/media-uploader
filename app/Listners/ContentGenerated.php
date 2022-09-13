<?php

namespace App\Listners;

use App\Enums\Category;
use App\Events\ContentCreated;
use App\Models\Image;
use App\Models\User;
use App\Models\Video;
use App\Models\Content;

class ContentGenerated
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
     * @param  \App\Events\ContentCreated  $event
     * @return void
     */
    public function handle(ContentCreated $event)
    {
        $item = $event->item;
        $category = match($item::class) {
            Image::class => Category::Image,
            Video::class => Category::Video,
        };
        $content = new Content([
            'content_id'  => $item->id,
            'category_id' => $category,
            'created_at'  => $item->created_at,
            'updated_at'  => $item->updated_at,
        ]);
        User::find($item->user_id)->contents()->save($content);
    }
}
