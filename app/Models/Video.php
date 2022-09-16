<?php

namespace App\Models;

use App\Events\ContentCreated;
use App\Events\ContentUpdated;
use App\Events\ContentDeleting;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    use usefulQueries;

    /**
     * create等で、設定可能な項目
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'youtube_id',
    ];

    protected $dispatchesEvents = [
        'created' => ContentCreated::class,
        'updated' => ContentUpdated::class,
        'deleting' => ContentDeleting::class,
    ];

    /**
     * Get youtube video id from url.
     *
     * @param  string $url
     * @return string
     */
    public static function get_youtube_id(string $url)
    {
        preg_match('/[\/=]([^\/=]+)$/', $url, $id);
        return $id[1];
    }

    /************
     * Relation *
     ************/
    /**
     * 画像を所持しているユーザを取得
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function content() {
        return $this->hasOne(Content::class, 'content_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'content_id');
    }
}
