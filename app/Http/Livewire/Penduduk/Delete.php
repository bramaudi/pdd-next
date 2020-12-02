<?php

namespace App\Http\Livewire\Penduduk;

use App\Models\Kependudukan\Penduduk;
use Livewire\Component;

class Delete extends Component
{
    public $userId;
    public $name;
    public $nik;

    protected $listeners = ['loadData'];

    public function loadData($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $this->userId = $id;
        $this->name = $penduduk->nama;
        $this->nik = $penduduk->nik;
    }

    public function submit()
    {
        $penduduk = Penduduk::findOrFail($this->userId);
        $penduduk->delete();

        $this->emit('remountList');
        $this->dispatchBrowserEvent('close-modals');
    }

    public function render()
    {
        return view('livewire.penduduk.delete');
    }
}
