<?php

namespace App\Http\Livewire\Table;

use App\Models\Kependudukan\Keluarga as KependudukanKeluarga;
use Livewire\Component;
use Livewire\WithPagination;

class Keluarga extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.table.keluarga', [
            'list' => KependudukanKeluarga::paginate(10)
        ]);
    }
}
