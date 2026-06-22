<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolProfileController extends Controller
{
    public function edit()
    {
        $profile = SchoolProfile::first() ?? new SchoolProfile();
        return view('admin.profil-sekolah.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'address'     => 'nullable|string|max:255',
            'phone'       => 'nullable|string|max:20',
            'email'       => 'nullable|email|max:255',
            'logo'        => 'nullable|image|max:2048',
        ]);

        $profile = SchoolProfile::first() ?? new SchoolProfile();

        $data = [
            'name'        => $request->name,
            'description' => $request->description,
            'address'     => $request->address,
            'phone'       => $request->phone,
            'email'       => $request->email,
        ];

        if ($request->hasFile('logo')) {
            if ($profile->logo) {
                Storage::disk('public')->delete($profile->logo);
            }
            $data['logo'] = $request->file('logo')->store('logo', 'public');
        }

        if ($profile->exists) {
            $profile->update($data);
        } else {
            SchoolProfile::create($data);
        }

        return redirect()->route('admin.profil-sekolah.edit')->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}
