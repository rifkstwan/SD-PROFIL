<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Inquiry;
use App\Models\User;
use App\Notifications\SystemNotification;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'parent_name' => 'required|string|max:255',
            'student_name' => 'required|string|max:255',
            'grade' => 'nullable|string|max:50',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string|max:1000',
        ]);

        $inquiry = Inquiry::create($validated);

        // Notify all admins/staf
        $users = User::all();
        foreach ($users as $user) {
            $user->notify(new SystemNotification(
                'Pendaftaran Baru: ' . $inquiry->student_name,
                'Orang tua: ' . $inquiry->parent_name . ' | Telepon: ' . $inquiry->phone
            ));
        }

        return back()->with('success', 'Formulir pendaftaran berhasil dikirim. Kami akan segera menghubungi Anda.');
    }
}
