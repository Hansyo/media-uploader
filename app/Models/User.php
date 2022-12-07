<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'self_info',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * ユーザーが所持している画像を取得
     */
    public function images() {
        return $this->hasMany(Image::class);
    }

    /**
     * ユーザーが所持している動画を取得
     */
    public function videos() {
        return $this->hasMany(Video::class);
    }

    /**
     * ユーザーが所持しているコンテンツを取得
     */
    public function contents() {
        return $this->hasMany(Content::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

}
