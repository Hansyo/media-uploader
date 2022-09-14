<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Image;
use App\Models\Video;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contents = Content::latest()->paginate(env('PAGE_MAX_LIMIT', 20), ['*'], 'contents')->withQueryString();
        $from = $contents->last()->created_at;
        $to = $contents->first()->created_at;
        $images = Image::getBetweenCreated($from, $to);
        $videos = Video::getBetweenCreated($from, $to);

        return view('home', compact('contents', 'images', 'videos'));
    }
}

