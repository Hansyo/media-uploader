<?php

namespace App\Enums;

enum Category: int
{
    // Basic Info
    case Image = 0;
    case Video = 1;

    // Japanese
    public function label(): string
    {
        return match ($this)
        {
            Category::Image => '画像',
            Category::Video => '動画',
        };
    }

    // tag
    public function tag(): string
    {
        return match ($this)
        {
            Category::Image => 'image',
            Category::Video => 'video',
        };
    }
}

