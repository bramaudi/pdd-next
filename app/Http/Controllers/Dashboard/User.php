<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class User extends Controller
{
    public function index()
    {
        return view('pages.dashboard.sistem.user');
    }
}