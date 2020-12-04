<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class Keluarga extends Controller
{
    public function update($id)
    {
        return view('pages.dashboard.kependudukan.keluarga-update',[
            'id' => $id
        ]);
    }
    
    public function create()
    {
        return view('pages.dashboard.kependudukan.keluarga-create');
    }

    public function index()
    {
        return view('pages.dashboard.kependudukan.keluarga');
    }
}