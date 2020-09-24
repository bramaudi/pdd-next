<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class Penduduk extends Controller
{
    public function index()
    {
        return view('pages.dashboard.kependudukan.penduduk');
    }
}