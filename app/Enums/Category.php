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

    public static function find(int $key): ?self
    {
        return match ($key) {
            0       => self::Image,
            1       => self::Video,
            default => null,
        };

    }

    public function cache_name(): string
    {
        return match ($this)
        {
            Category::Image => \App\Http\Controllers\ImageController::class,
            Category::Video => \App\Http\Controllers\VideoController::class,
        };
    }
}

