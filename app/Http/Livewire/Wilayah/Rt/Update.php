<?php

namespace App\Http\Livewire\Wilayah\Rt;

use App\Models\Cluster\Rt;
use App\Models\Cluster\Rw;
use Livewire\Component;

class Update extends Component
{
    public $rw, $rt_id, $nomor;
    public $loading = true;

    protected $listeners = ['loadData', 'modalClose'];

    public function loadData($id)
    {
        $rt = Rt::findOrFail($id);
        $this->rt_id = $id;
        $this->nomor = $rt->nomor;
        $this->loading = false;
    }

    public function modalClose()
    {
        $this->rt_id = null;
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

        $rt = Rt::findOrFail($this->rt_id);
        $rt->nomor = $this->nomor;

        $update = $rt->save();

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
        $rw = Rw::find($this->rw);

        return view('livewire.wilayah.rt.update', [
            'dusun' => $rw->lingkungan->nama,
            'rw' => $rw->nomor,
        ]);
    }
}
