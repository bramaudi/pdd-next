<?php

namespace App\Http\Livewire\Wilayah\Rw;

use App\Models\Cluster\Lingkungan;
use App\Models\Cluster\Rw;
use Livewire\Component;

class Create extends Component
{
    public $lingkungan, $nomor;

    protected $listeners = ['modalClose'];

    public function modalClose()
    {
        $this->nomor = null;
    }

    public function submit()
    {
        $this->validate([
            'nomor' => 'required|numeric',
        ], [], [
            'nomor' => 'Nomor RW'
        ]);

        $create = Rw::create([
            'lingkungan_id' => $this->lingkungan,
            'nomor' => $this->nomor,
        ]);

        if ($create) {
            $this->modalClose();
            $this->emit('remountList');
            $this->dispatchBrowserEvent('close-modals');
        } else {
            session()->flash('failed', 'Gagal menyimpan data.');
        }
    }

    public function render()
    {
        return view('livewire.wilayah.rw.create', [
            'dusun' => Lingkungan::find($this->lingkungan)->nama,
        ]);
    }
}
