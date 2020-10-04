<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class Wilayah extends Controller
{
    public function index()
    {
        return view('pages.dashboard.desa.wilayah');
    }

    public function rw($lingkungan_id)
    {
        return view('pages.dashboard.desa.wilayah-rw', [
            'lingkungan_id' => $lingkungan_id
        ]);
    }

    public function rt($rw_id)
    {
        return view('pages.dashboard.desa.wilayah-rt', [
            'rw_id' => $rw_id
        ]);
    }
}
