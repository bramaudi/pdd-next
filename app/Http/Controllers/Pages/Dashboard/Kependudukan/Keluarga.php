<?php

namespace App\Http\Controllers\Pages\Dashboard\Kependudukan;

use App\Models\Kependudukan\Keluarga as KependudukanKeluarga;
use Livewire\Component;

class Keluarga extends Component
{
    public function render()
    {
        return view('pages.dashboard.kependudukan.keluarga', [
            'keluargaList' => KependudukanKeluarga::all()
        ]);
    }
}
