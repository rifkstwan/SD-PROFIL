<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::latest()->paginate(10);
        return view('admin.prestasi.index', compact('achievements'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_line1' => 'required|string|max:255',
            'title_line2' => 'required|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'category'    => 'required|string|max:255',
            'date'        => 'required|string|max:255',
            'student_name'=> 'required|string|max:255',
            'image'       => 'required|image|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('achievements', 'public');
        }

        Achievement::create($data);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function show(Achievement $prestasi)
    {
        return redirect()->route('admin.prestasi.edit', $prestasi);
    }

    public function edit(Achievement $prestasi)
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Achievement $prestasi)
    {
        $request->validate([
            'title_line1' => 'required|string|max:255',
            'title_line2' => 'required|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'category'    => 'required|string|max:255',
            'date'        => 'required|string|max:255',
            'student_name'=> 'required|string|max:255',
            'image'       => 'nullable|image|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            if ($prestasi->image) {
                Storage::disk('public')->delete($prestasi->image);
            }
            $data['image'] = $request->file('image')->store('achievements', 'public');
        }

        $prestasi->update($data);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Achievement $prestasi)
    {
        if ($prestasi->image) {
            Storage::disk('public')->delete($prestasi->image);
        }
        $prestasi->delete();

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil dihapus.');
    }
}
