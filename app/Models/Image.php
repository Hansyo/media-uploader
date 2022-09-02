<?php

namespace App\Models;

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

    /**
     * 画像を所持しているユーザを取得
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
