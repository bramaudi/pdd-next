<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class Welcome extends Controller
{
    public function index()
    {
        return view('pages.welcome');
    }
}
