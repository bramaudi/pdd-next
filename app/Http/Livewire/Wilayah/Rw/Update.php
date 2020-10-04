<?php

namespace App\Http\Livewire\Wilayah\Rw;

use App\Models\Cluster\Lingkungan;
use App\Models\Cluster\Rw;
use Livewire\Component;

class Update extends Component
{
    public $lingkungan, $rw_id, $nomor;
    public $loading = true;

    protected $listeners = ['loadData', 'modalClose'];

    public function loadData($id)
    {
        $rw = Rw::findOrFail($id);
        $this->rw_id = $id;
        $this->nomor = $rw->nomor;
        $this->loading = false;
    }

    public function modalClose()
    {
        $this->rw_id = null;
        $this->nomor = null;
        $this->loading = true;
        $this->resetErrorBag();
    }

    public function submit()
    {
        $this->validate([
            'nomor' => 'required|numeric',
        ], [], [
            'nomor' => 'Nomor RW'
        ]);

        $rw = Rw::findOrFail($this->rw_id);
        $rw->nomor = $this->nomor;

        $update = $rw->save();

        if ($update) {
            $this->modalClose();
            $this->emit('remountList');
            $this->dispatchBrowserEvent('close-modals');
        } else {
            session()->flash('failed', 'Gagal menyimpan data.');
        }
    }

    public function render()
    {
        return view('livewire.wilayah.rw.update', [
            'dusun' => Lingkungan::find($this->lingkungan)->nama,
        ]);
    }
}
