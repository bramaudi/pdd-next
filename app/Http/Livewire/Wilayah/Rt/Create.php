<?php

namespace App\Http\Livewire\Wilayah\Rt;

use App\Models\Cluster\Lingkungan;
use App\Models\Cluster\Rt;
use App\Models\Cluster\Rw;
use Livewire\Component;

class Create extends Component
{
    public $rw, $nomor;

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
            'nomor' => 'Nomor RT'
        ]);

        $create = Rt::create([
            'rw_id' => $this->rw,
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
        $rw = Rw::find($this->rw);

        return view('livewire.wilayah.rt.create', [
            'dusun' => $rw->lingkungan->nama,
            'rw' => $rw->nomor,
        ]);
    }
}
