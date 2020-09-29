<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class Penduduk extends Controller
{
    public function create()
    {
        return view('pages.dashboard.kependudukan.penduduk-create');
    }
    
    public function update($id)
    {
        return view('pages.dashboard.kependudukan.penduduk-update', [
            'id' => $id
        ]);
    }

    public function index()
    {
        return view('pages.dashboard.kependudukan.penduduk');
    }
}