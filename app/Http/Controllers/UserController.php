<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        $page = $request->has('contents') ? $request->query('contents') : 1;
        $contents = Cache::remember(self::class.'_'.$user->name.'_contents_'.$page, env("CACHE_TIME_SEC", 10), fn() => $user->contents()->latest()->paginate(env('PAGE_MAX_LIMIT', 20), ['*'], 'contents')->withQueryString());
        if($contents->count() !== 0){
            $from = Cache::remember(self::class.'_'.$user->name.'_from_'.$page, env("CACHE_TIME_SEC", 10), fn() => $contents->last()->created_at);
            $to = Cache::remember(self::class.'_'.$user->name.'_to_'.$page, env("CACHE_TIME_SEC", 10), fn() => $contents->first()->created_at);
            $images = Cache::remember(self::class.'_'.$user->name.'_images_'.$page, env("CACHE_TIME_SEC", 10), fn() => Image::getBetweenCreated($from, $to));
            $videos = Cache::remember(self::class.'_'.$user->name.'_videos_'.$page, env("CACHE_TIME_SEC", 10), fn() => Video::getBetweenCreated($from, $to));
        } else {
            $images = [];
            $videos = [];
        }

        return view('user.info', compact('user', 'contents', 'images', 'videos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
