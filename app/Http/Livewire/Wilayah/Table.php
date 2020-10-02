<?php

namespace App\Http\Livewire\Wilayah;

use App\Models\Cluster\Lingkungan;
use App\Models\Label\Label;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.wilayah.table', [
            'list' => Lingkungan::paginate(10),
            'pria_id' => Label::whereLabel('L')->first()->id,
            'wanita_id' => Label::whereLabel('P')->first()->id,
        ]);
    }
}
