<?php

namespace App\Models;

use App\Enums\Category;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'content_id',
        'category_id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'category_id' => Category::class,
    ];

    /************
     * Relation *
     ************/
    /**
     * 画像を所持しているユーザを取得
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /***
     * Category_idに基づいたリレーションの振り分け
     */
    public function content() {
        return match ($this->category_id) {
            Category::Image => $this->belongsTo(Image::class, 'content_id'),
            Category::Video => $this->belongsTo(Video::class, 'content_id'),
        };
    }
}

