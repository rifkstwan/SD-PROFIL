<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'title'     => 'required|string|max:255',
            'content'   => 'required',
            'status'    => 'required|in:draft,published',
            'thumbnail' => 'nullable|image|max:2048',
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
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
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
            'title'     => 'required|string|max:255',
            'content'   => 'required',
            'status'    => 'required|in:draft,published',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $data = [
            'title'        => $request->title,
            'content'      => $request->content,
            'status'       => $request->status,
            'published_at' => $request->status === 'published' && !$beritum->published_at ? now() : $beritum->published_at,
        ];

        if ($request->hasFile('thumbnail')) {
            if ($beritum->thumbnail) {
                Storage::disk('public')->delete($beritum->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $beritum->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $beritum)
    {
        if ($beritum->thumbnail) {
            Storage::disk('public')->delete($beritum->thumbnail);
        }
        $beritum->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    public function show(News $beritum)
    {
        return redirect()->route('admin.berita.edit', $beritum);
    }
}
