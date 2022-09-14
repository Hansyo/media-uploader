<?php

namespace App\Http\Controllers;

use App\Enums\Category;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Image;
use App\Models\User;
use Exception;
use Illuminate\Http\FileHelpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{

    use FileHelpers; // ファイルをダウンロードする際に使うHashを持ってくる。

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Image::latest()->paginate(env('PAGE_MAX_LIMIT', 20), ['*'], 'contents')->withQueryString()
            ->through(function ($item) {
                $item->category_id = Category::Image;
                $item->content_id = $item->id;
                return $item;
            });
            return view('home', ['contents' => $contents, 'images' => $contents, 'headerTxt' => 'All Images']);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('image.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
        return view('image.upload');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImageRequest $request)
    {
        $user = User::find(Auth::id());
        if ($request->hasFile("file")){
            $filePath = $request->file('file')->store('images', 'public'); // ランダムな名前でファイルを保存
        } else {
            $imageFile = Http::get($request->image_url);
            preg_match('/\.[^.]+$/', basename($request->image_url), $extension);
            $filePath = 'images/' . Str::random(40) . $extension[0];
            Storage::disk('public')->put($filePath, $imageFile, );
        }

        $image = new Image([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
        ]);
        $user->images()->save($image);
        return redirect()->route('image.show', $image->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        return view('image.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        return view('image.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImageRequest  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        // データを更新
        $image->title = $request->title;
        $image->description = $request->description;

        // 新規ファイルの保存
        if ($request->hasFile('file')){
            $image->file_path = $request->file('file')->store('images', 'public'); // ランダムな名前でファイルを保存
        } else if ($request->filled('image_url')) {
            $imageFile = Http::get($request->image_url);
            preg_match('/\.[^.]+$/', basename($request->image_url), $extension);
            $image->file_path = 'images/' . Str::random(40) . $extension[0];
            Storage::disk('public')->put($image->file_path, $imageFile);
        }

        // 不要なファイルを削除
        if ($image->isDirty('file_path')) {
            Storage::disk('public')->delete($image->getOriginal('file_path'));
        }

        // 保存処理
        try {
            $image->save();
            Session::flash('flash_message', 'Successful update.');
        } catch (Exception $e) {
            Session::flash('error_message', 'Server error.');
        }
        return redirect()->route('image.show', $image);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        try {
            Storage::disk('public')->delete($image->file_path);
            $image->delete();
        } catch (Exception $e) {
            Session::flash('error_message', 'Server error.');
            return redirect()->route('image.show', $image);
        }
        return redirect()->route('home');
    }
}
