<?php

namespace App\Http\Controllers;

use App\Enums\Category;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\User;
use App\Models\Video;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->has('contents') ? $request->query('contents') : 1;
        $contents = Cache::remember(
            self::class . '_contents_' . $page,
            env("CACHE_TIME_SEC", 10),
            fn () => Video::latest()->paginate(env('PAGE_MAX_LIMIT', 20), ['*'], 'contents')->withQueryString()
                ->through(function ($item) {
                    $item->category_id = Category::Video;
                    $item->content_id = $item->id;
                    return $item;
                })
        );
        return view('home', ['contents' => $contents, 'videos' => $contents, 'headerTxt' => 'All Videos']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoRequest $request)
    {
        $user = User::find(Auth::id());

        $video = new Video([
            'title' => $request->title,
            'description' => $request->description,
            'youtube_id' => Video::get_youtube_id($request->url),
        ]);
        $user->videos()->save($video);
        return redirect()->route('video.show', $video->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('video.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVideoRequest  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        // データを更新
        $video->title = $request->title;
        $video->description = $request->description;
        $video->youtube_id = Video::get_youtube_id($request->url);

        // 保存処理
        try {
            $video->save();
            Session::flash('flash_message', 'Successful update.');
        } catch (Exception $e) {
            Session::flash('error_message', 'Server error.');
        }
        return redirect()->route('video.show', $video);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        try {
            $video->delete();
        } catch (Exception $e) {
            Session::flash('error_message', 'Server error.');
        }
        return redirect()->route('home');
    }
}
