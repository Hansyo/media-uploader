<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * フォームを作成した際に、入力可能な項目
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
    ];

    /**
     * 画像を所持しているユーザを取得
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
