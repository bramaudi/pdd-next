<?php

namespace App\Http\Livewire\Keluarga;

use App\Models\Kependudukan\Keluarga;
use Livewire\Component;

class Delete extends Component
{
    public $keluargaId;
    public $no_kk;
    public $nama_kepala;

    protected $listeners = ['loadData'];

    public function loadData($id)
    {
        $keluarga = Keluarga::findOrFail($id);
        $this->keluargaId = $id;
        $this->no_kk = $keluarga->no_kk;
        $this->nama_kepala = $keluarga->kepala() ? $keluarga->kepala()->nama : '--';
    }

    public function submit()
    {
        $keluarga = Keluarga::findOrFail($this->keluargaId);
        $keluarga->delete();

        $this->emit('remountList');
        $this->dispatchBrowserEvent('close-modals');
    }

    public function render()
    {
        return view('livewire.keluarga.delete');
    }
}
