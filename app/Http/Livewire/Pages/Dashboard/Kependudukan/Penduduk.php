<?php

namespace App\Http\Livewire\Pages\Dashboard\Kependudukan;

use App\Models\Kependudukan\Penduduk as ModelPenduduk;
use Livewire\Component;
use Livewire\WithPagination;

class Penduduk extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.pages.dashboard.kependudukan.penduduk', [
            'listPenduduk' => ModelPenduduk::paginate(10)
        ]);
    }
}
