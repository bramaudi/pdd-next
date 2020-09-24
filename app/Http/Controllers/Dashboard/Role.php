<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class Role extends Controller
{
    public function index()
    {
        return view('pages.dashboard.sistem.role');
    }
}
