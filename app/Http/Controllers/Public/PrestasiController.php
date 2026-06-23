<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Achievement;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasiList = Achievement::latest()->get();

        return view('public.prestasi.index', compact('prestasiList'));
    }
}
