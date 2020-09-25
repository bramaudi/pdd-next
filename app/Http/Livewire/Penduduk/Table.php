<?php

namespace App\Http\Livewire\Penduduk;

use App\Models\Kependudukan\Penduduk as Model;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.penduduk.table', [
            'list' => Model::paginate(10)
        ]);
    }
}
