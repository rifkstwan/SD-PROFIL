<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('images')->latest()->paginate(10);
        return view('admin.galeri.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'images'      => 'nullable|array',
            'images.*'    => 'image|max:2048',
            'image_urls'  => 'nullable|string',
        ]);

        $gallery = Gallery::create([
            'user_id'     => auth()->id(),
            'title'       => $request->title,
            'description' => $request->description,
        ]);

        if ($request->hasFile('images')) {
            try {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('galleries', env('FILESYSTEM_DISK', 'public'));
                    GalleryImage::create([
                        'gallery_id' => $gallery->id,
                        'image_path' => $path,
                        'caption'    => null,
                    ]);
                }
            } catch (\Exception $e) {
                return back()->withInput()->withErrors(['images' => 'Gagal mengunggah file. Serverless Vercel tidak mendukung penyimpanan file lokal. Silakan gunakan opsi URL Gambar di bawah.']);
            }
        }

        if ($request->filled('image_urls')) {
            $urls = preg_split('/\r\n|\r|\n/', $request->image_urls);
            foreach ($urls as $url) {
                $url = trim($url);
                if (filter_var($url, FILTER_VALIDATE_URL)) {
                    GalleryImage::create([
                        'gallery_id' => $gallery->id,
                        'image_path' => $url,
                        'caption'    => null,
                    ]);
                }
            }
        }

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function show(Gallery $galeri)
    {
        return redirect()->route('admin.galeri.edit', $galeri);
    }

    public function edit(Gallery $galeri)
    {
        $galeri->load('images');
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Gallery $galeri)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'images'      => 'nullable|array',
            'images.*'    => 'image|max:2048',
            'image_urls'  => 'nullable|string',
        ]);

        $galeri->update([
            'title'       => $request->title,
            'description' => $request->description,
        ]);

        if ($request->hasFile('images')) {
            try {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('galleries', env('FILESYSTEM_DISK', 'public'));
                    GalleryImage::create([
                        'gallery_id' => $galeri->id,
                        'image_path' => $path,
                        'caption'    => null,
                    ]);
                }
            } catch (\Exception $e) {
                return back()->withInput()->withErrors(['images' => 'Gagal mengunggah file. Serverless Vercel tidak mendukung penyimpanan file lokal. Silakan gunakan opsi URL Gambar di bawah.']);
            }
        }

        if ($request->filled('image_urls')) {
            $urls = preg_split('/\r\n|\r|\n/', $request->image_urls);
            foreach ($urls as $url) {
                $url = trim($url);
                if (filter_var($url, FILTER_VALIDATE_URL)) {
                    GalleryImage::create([
                        'gallery_id' => $galeri->id,
                        'image_path' => $url,
                        'caption'    => null,
                    ]);
                }
            }
        }

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $galeri)
    {
        foreach ($galeri->images as $image) {
            if ($image->image_path && !Str::startsWith($image->image_path, 'http')) {
                Storage::disk(env('FILESYSTEM_DISK', 'public'))->delete($image->image_path);
            }
        }
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }

    public function destroyImage(GalleryImage $image)
    {
        if ($image->image_path && !Str::startsWith($image->image_path, 'http')) {
            Storage::disk(env('FILESYSTEM_DISK', 'public'))->delete($image->image_path);
        }
        $image->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }
}
