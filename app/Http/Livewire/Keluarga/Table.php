<?php

namespace App\Http\Livewire\Keluarga;

use App\Models\Kependudukan\Keluarga as Model;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.keluarga.table', [
            'list' => Model::paginate(10)
        ]);
    }
}
