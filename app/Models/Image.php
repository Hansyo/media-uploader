<?php

namespace App\Models;

use App\Events\ContentCreated;
use App\Events\ContentUpdated;
use App\Events\ContentDeleting;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * create等で、設定可能な項目
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'file_path',
    ];

    protected $dispatchesEvents = [
        'created' => ContentCreated::class,
        'updated' => ContentUpdated::class,
        'deleting' => ContentDeleting::class,
    ];

    /**
     * 画像を所持しているユーザを取得
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function content() {
        return $this->hasOne(Content::class, 'content_id');
    }
}
