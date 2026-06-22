<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::where('status', 'published')->latest('published_at')->paginate(9);
        return view('public.berita.index', compact('news'));
    }

    public function show(string $slug)
    {
        $news = News::where('slug', $slug)->where('status', 'published')->firstOrFail();
        return view('public.berita.show', compact('news'));
    }
}
