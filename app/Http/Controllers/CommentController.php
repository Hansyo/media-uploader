<?php

namespace App\Http\Controllers;

use App\Enums\Category;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        $user = User::find(Auth::id());
        $category = Category::find($request->category_id);
        $comment = new Comment([
            'comment' => $request->comment,
            'content_id' => $request->content_id,
            'category_id' => $category,
        ]);
        $user->comments()->save($comment);
        // コンテンツのキャッシュを削除する
        $cache_key = $category->cache_name() . '_comments_' . $comment->content_id;
        Log::debug($cache_key);
        if (Cache::has($cache_key)) Cache::forget($cache_key);
        return redirect()->route($category->tag() . '.show', $comment->content);
    }
}

