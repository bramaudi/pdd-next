<?php

namespace App\Http\Livewire\Surat\Format;

use App\Models\Surat\SuratFormat;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Table extends Component
{
    public Collection $formats;

    protected $listeners = ['remount' => 'mount'];

    public function mount(): void
    {
        $this->formats = SuratFormat::all();
    }

    public function render()
    {
        return view('livewire.surat.format.table');
    }
}
