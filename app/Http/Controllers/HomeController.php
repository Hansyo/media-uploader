<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Image;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        #$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $page = $request->has('contents') ? $request->query('contents') : 1;
        $contents = Cache::remember(self::class.'_contents_'.$page, env("CACHE_TIME_SEC", 10), fn() => Content::latest()->paginate(env('PAGE_MAX_LIMIT', 20), ['*'], 'contents')->withQueryString());
        $from =  $contents->last()->created_at;
        $to = $contents->first()->created_at;
        $images = Cache::remember(self::class.'_images_'.$page, env("CACHE_TIME_SEC", 10), fn() => Image::getBetweenCreated($from, $to));
        $videos = Cache::remember(self::class.'_videos_'.$page, env("CACHE_TIME_SEC", 10), fn() => Video::getBetweenCreated($from, $to));

        return view('home', compact('contents', 'images', 'videos'));
    }
}

