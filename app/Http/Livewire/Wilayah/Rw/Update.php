<?php

namespace App\Http\Livewire\Wilayah\Rw;

use App\Models\Cluster\Lingkungan;
use App\Models\Cluster\Rw;
use App\Models\Kependudukan\Penduduk;
use Livewire\Component;

class Update extends Component
{
    public $lingkungan, $rw_id, $nomor, $kepala_id, $find, $finded;
    public $loading = true;

    protected $listeners = ['loadData', 'modalClose'];

    public function loadData($id)
    {
        $rw = Rw::findOrFail($id);
        $this->rw_id = $id;
        $this->nomor = $rw->nomor;
        $this->kepala_id = $rw->kepala_id;
        $this->find = $this->kepala_id ? $rw->kepala->nik : null;
        $this->loading = false;
    }

    public function modalClose()
    {
        $this->rw_id = null;
        $this->nomor = null;
        $this->find = null;
        $this->kepala_id = null;
        $this->loading = true;
        $this->resetErrorBag();
    }

    public function submit()
    {
        $this->kepala_id = $this->finded ? $this->finded->id : null;

        if (empty($this->find)) {
            $this->kepala_id = null;
        }

        $this->validate([
            'nomor' => 'required|numeric',
            'kepala_id' => 'nullable|unique:lingkungan_rw,kepala_id,' . $this->rw_id
        ], [], [
            'nomor' => 'Nomor RW',
            'kepala_id' => 'Ketua RW',
        ]);

        $rw = Rw::findOrFail($this->rw_id);
        $rw->nomor = $this->nomor;
        $rw->kepala_id = $this->kepala_id;

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
        $ketua_rw = $this->kepala_id ? Penduduk::find(Rw::find($this->rw_id)->kepala_id) : false;

        $findPenduduk = Penduduk::where('nik', 'like', "%$this->find%")
                                    ->orWhere('nama', 'like', "%$this->find%")
                                    ->get();

        $this->finded = Penduduk::where('nik', $this->find)->first();

        return view('livewire.wilayah.rw.update', [
            'dusun' => Lingkungan::find($this->lingkungan)->nama,
            'ketua_rw' => $ketua_rw,
            'list' => $this->find ? $findPenduduk : [],
            'finded' => $this->finded
        ]);
    }
}
