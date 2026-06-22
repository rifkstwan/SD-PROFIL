<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Gallery;
use App\Models\SchoolProfile;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews    = News::where('status', 'published')->latest('published_at')->take(5)->get();
        $latestGallery = Gallery::with('images')->latest()->take(5)->get();
        $profile       = SchoolProfile::first();
        $settings      = SiteSetting::pluck('value', 'key')->toArray();

        return view('public.home', compact('latestNews', 'latestGallery', 'profile', 'settings'));
    }
}
