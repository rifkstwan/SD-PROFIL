<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('user')->latest()->paginate(10);
        return view('admin.berita.index', compact('news'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required',
            'status'        => 'required|in:draft,published',
            'thumbnail'     => 'nullable|image|max:2048',
            'thumbnail_url' => 'nullable|url|max:2048',
        ]);

        $data = [
            'user_id'      => auth()->id(),
            'title'        => $request->title,
            'slug'         => News::generateSlug($request->title),
            'content'      => $request->content,
            'status'       => $request->status,
            'published_at' => $request->status === 'published' ? now() : null,
        ];

        if ($request->hasFile('thumbnail')) {
            try {
                $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', env('FILESYSTEM_DISK', 'public'));
            } catch (\Exception $e) {
                return back()->withInput()->withErrors(['thumbnail' => 'Gagal mengunggah file. Serverless Vercel tidak mendukung penyimpanan file lokal. Silakan gunakan opsi URL Gambar di bawah.']);
            }
        } elseif ($request->filled('thumbnail_url')) {
            $data['thumbnail'] = $request->thumbnail_url;
        }

        News::create($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(News $beritum)
    {
        return view('admin.berita.edit', ['news' => $beritum]);
    }

    public function update(Request $request, News $beritum)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required',
            'status'        => 'required|in:draft,published',
            'thumbnail'     => 'nullable|image|max:2048',
            'thumbnail_url' => 'nullable|url|max:2048',
        ]);

        $data = [
            'title'        => $request->title,
            'content'      => $request->content,
            'status'       => $request->status,
            'published_at' => $request->status === 'published' && !$beritum->published_at ? now() : $beritum->published_at,
        ];

        if ($request->hasFile('thumbnail')) {
            if ($beritum->thumbnail && !Str::startsWith($beritum->thumbnail, 'http')) {
                Storage::disk(env('FILESYSTEM_DISK', 'public'))->delete($beritum->thumbnail);
            }
            try {
                $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', env('FILESYSTEM_DISK', 'public'));
            } catch (\Exception $e) {
                return back()->withInput()->withErrors(['thumbnail' => 'Gagal mengunggah file. Serverless Vercel tidak mendukung penyimpanan file lokal. Silakan gunakan opsi URL Gambar di bawah.']);
            }
        } elseif ($request->filled('thumbnail_url')) {
            if ($beritum->thumbnail && !Str::startsWith($beritum->thumbnail, 'http')) {
                Storage::disk(env('FILESYSTEM_DISK', 'public'))->delete($beritum->thumbnail);
            }
            $data['thumbnail'] = $request->thumbnail_url;
        }

        $beritum->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $beritum)
    {
        if ($beritum->thumbnail && !Str::startsWith($beritum->thumbnail, 'http')) {
            Storage::disk(env('FILESYSTEM_DISK', 'public'))->delete($beritum->thumbnail);
        }
        $beritum->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    public function show(News $beritum)
    {
        return redirect()->route('admin.berita.edit', $beritum);
    }
}
