<?php

namespace App\Models;

use App\Enums\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment',
        'content_id',
        'category_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function content() {
        return match ($this->category_id) {
            Category::Image => $this->belongsTo(Image::class, 'content_id'),
            Category::Video => $this->belongsTo(Video::class, 'content_id'),
        };
    }
}
