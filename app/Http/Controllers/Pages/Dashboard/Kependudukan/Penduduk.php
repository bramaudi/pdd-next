<?php

namespace App\Http\Controllers\Pages\Dashboard\Kependudukan;

use App\Models\Kependudukan\Penduduk as ModelPenduduk;
use Livewire\Component;
use Livewire\WithPagination;

class Penduduk extends Component
{
    use WithPagination;

    public function render()
    {
        return view('pages.dashboard.kependudukan.penduduk', [
            'listPenduduk' => ModelPenduduk::paginate(10)
        ]);
    }
}
