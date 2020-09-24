<?php

namespace App\Http\Livewire\Table;

use App\Models\Kependudukan\Penduduk as ModelPenduduk;
use Livewire\Component;
use Livewire\WithPagination;

class Penduduk extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.table.penduduk', [
            'list' => ModelPenduduk::paginate(10)
        ]);
    }
}
