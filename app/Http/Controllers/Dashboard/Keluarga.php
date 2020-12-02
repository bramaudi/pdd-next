<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class Keluarga extends Controller
{
    public function create()
    {
        return view('pages.dashboard.kependudukan.keluarga-create');
    }

    public function index()
    {
        return view('pages.dashboard.kependudukan.keluarga');
    }
}