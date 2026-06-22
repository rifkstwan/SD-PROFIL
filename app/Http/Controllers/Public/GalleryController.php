<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('images')->latest()->get();
        $allImages = GalleryImage::with('gallery')->latest()->get();

        return view('public.galeri.index', compact('galleries', 'allImages'));
    }
}
