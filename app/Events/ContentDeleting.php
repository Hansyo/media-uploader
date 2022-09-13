<?php

namespace App\Events;

use App\Models\Image;
use App\Models\Video;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ContentDeleting
{
    use Dispatchable, SerializesModels;

    public Image|Video $item;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\Image|\App\Models\Video $item
     * @return void
     */
    public function __construct(Image|Video $item)
    {
        $this->item = $item;
    }
}

