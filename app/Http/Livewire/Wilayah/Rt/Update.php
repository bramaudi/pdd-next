<?php

namespace App\Http\Livewire\Wilayah\Rt;

use App\Models\Cluster\Rt;
use App\Models\Cluster\Rw;
use App\Models\Kependudukan\Penduduk;
use Livewire\Component;

class Update extends Component
{
    public $rw, $rt_id, $nomor, $kepala_id, $find, $finded;
    public $loading = true;

    protected $listeners = ['loadData', 'modalClose'];

    public function loadData($id)
    {
        $rt = Rt::findOrFail($id);
        $this->rt_id = $id;
        $this->nomor = $rt->nomor;
        $this->kepala_id = $rt->kepala_id;
        $this->find = $this->kepala_id ? $rt->kepala->nik : null;
        $this->loading = false;
    }

    public function modalClose()
    {
        $this->rt_id = null;
        $this->nomor = null;
        $this->kepala_id = null;
        $this->find = null;
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
            'kepala_id' => 'nullable|unique:lingkungan_rt,kepala_id,' . $this->rt_id,
        ], [], [
            'nomor' => 'Nomor RW',
            'kepala_id' => 'Ketua RW',
        ]);

        $rt = Rt::findOrFail($this->rt_id);
        $rt->nomor = $this->nomor;
        $rt->kepala_id = $this->kepala_id;

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

        $ketua_rt = $this->kepala_id ? Penduduk::find(Rt::find($this->rt_id)->kepala_id) : false;

        $findPenduduk = Penduduk::where('nik', 'like', "%$this->find%")
                                    ->orWhere('nama', 'like', "%$this->find%")
                                    ->get();

        $this->finded = Penduduk::where('nik', $this->find)->first();

        return view('livewire.wilayah.rt.update', [
            'dusun' => $rw->lingkungan->nama,
            'rw' => $rw->nomor,
            'ketua_rt' => $ketua_rt,
            'list' => $this->find ? $findPenduduk : [],
            'finded' => $this->finded,
        ]);
    }
}
