<?php

namespace App\Http\Livewire\Surat\Format;

use App\Models\Surat\Format\Format;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Table extends Component
{
    public $formats;

    protected $listeners = ['refresh'];

    public function refresh(): void
    {
        $this->formats = []; // Berhasil Mengosongkan List

        // $this->mount(); // Hanya mengacak list, item yang terhapus masih ada dan pindah urutan
    }

    public function mount(): void
    {
        $this->formats = Format::all();
    }

    public function render()
    {
        return view('livewire.surat.format.table');
    }
}
