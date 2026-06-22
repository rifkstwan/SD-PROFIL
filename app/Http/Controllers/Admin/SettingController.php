<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key');
        return view('admin.pengaturan.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name'  => 'nullable|string|max:255',
            'site_phone' => 'nullable|string|max:20',
            'site_email' => 'nullable|email|max:255',
            'site_address' => 'nullable|string|max:255',
        ]);

        $keys = ['site_name', 'site_phone', 'site_email', 'site_address'];

        foreach ($keys as $key) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $request->input($key)]
            );
        }

        return redirect()->route('admin.pengaturan.index')->with('success', 'Pengaturan berhasil disimpan.');
    }
}
