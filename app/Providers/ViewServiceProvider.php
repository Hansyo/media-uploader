<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{

    private $request;

    /**
     * 全アプリケーションサービスの登録
     *
     * @return void
     */
    public function register()
    {
        $this->request = $this->app->request;
    }

    /**
     * 全アプリケーションサービスの初期起動

     *
     * @return void
     */
    public function boot()
    {
        // クラスベースのコンポーザを使用する
        View::composer('home', function ($view) {
            $view->with(
                'users',
                Cache::remember(
                    self::class . '_users_' . $this->request->has('users') ? $this->request->query('users') : 1,
                    env("CACHE_TIME_SEC", 10),
                    fn () => User::simplePaginate(env('PAGE_MAX_LIMIT', 20), ['*'], 'users')->withQueryString()
                )
            );
            if (Auth::check()) $view->with('user', Auth::user());
        });
    }
}
