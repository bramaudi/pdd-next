<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class Config extends Controller
{
    public function index()
    {
        return view('pages.dashboard.desa.config');
    }
}