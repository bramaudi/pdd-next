<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class Wilayah extends Controller
{
    public function index()
    {
        return view('pages.dashboard.desa.wilayah');
    }
}
