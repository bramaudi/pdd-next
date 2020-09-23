<?php

namespace App\Http\Livewire\Pages\Dashboard\Kependudukan;

use App\Models\Kependudukan\Keluarga as KependudukanKeluarga;
use Livewire\Component;
use Livewire\WithPagination;

class Keluarga extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.pages.dashboard.kependudukan.keluarga', [
            'keluargaList' => KependudukanKeluarga::paginate(10)
        ]);
    }
}
