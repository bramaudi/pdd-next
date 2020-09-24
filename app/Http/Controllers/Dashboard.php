<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cluster\Lingkungan;
use App\Models\Kependudukan\Keluarga;
use App\Models\Kependudukan\Penduduk;
use App\Models\User;

class Dashboard extends Controller
{
    public function index()
    {
        return view('pages.dashboard', [
            'operator' => User::all()->count(),
            'penduduk' => Penduduk::all()->count(),
            'keluarga' => Keluarga::all()->count(),
            'lingkungan' => Lingkungan::all()->count(),
        ]);
    }
}
