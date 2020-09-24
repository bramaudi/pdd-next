<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class Keluarga extends Controller
{
    public function index()
    {
        return view('pages.dashboard.kependudukan.keluarga');
    }
}