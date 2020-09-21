<?php

namespace App\Http\Controllers\Pages\Dashboard\Kependudukan;

use App\Models\Kependudukan\Keluarga as KependudukanKeluarga;
use Livewire\Component;
use Livewire\WithPagination;

class Keluarga extends Component
{
    use WithPagination;

    public function render()
    {
        return view('pages.dashboard.kependudukan.keluarga', [
            'keluargaList' => KependudukanKeluarga::paginate(10)
        ]);
    }
}
