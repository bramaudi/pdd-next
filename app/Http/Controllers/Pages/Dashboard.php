<?php

namespace App\Http\Controllers\Pages;

use App\Models\Cluster\Lingkungan;
use App\Models\Kependudukan\Keluarga;
use App\Models\Kependudukan\Penduduk;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('pages.dashboard', [
            'operator' => User::all()->count(),
            'penduduk' => Penduduk::all()->count(),
            'keluarga' => Keluarga::all()->count(),
            'lingkungan' => Lingkungan::all()->count(),
        ]);
    }
}
