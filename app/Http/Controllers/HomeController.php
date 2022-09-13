<?php

namespace App\Http\Controllers;

use App\Models\Content;

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
        $contents = Content::latest()->paginate(env('PAGE_MAX_LIMIT', 20), ['*'], 'contents');
        return view('home', compact('contents'));
    }
}

