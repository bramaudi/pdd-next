<?php

namespace App\Http\Livewire\Wilayah\Rt;

use App\Models\Cluster\Lingkungan;
use App\Models\Cluster\Rt;
use App\Models\Cluster\Rw;
use App\Models\Kependudukan\Penduduk;
use Livewire\Component;

class Create extends Component
{
    public $rw, $nomor, $kepala_id, $find;

    protected $listeners = ['modalClose'];

    public function modalClose()
    {
        $this->nomor = null;
        $this->kepala_id = null;
        $this->find = null;
    }

    public function submit()
    {
        $this->kepala_id = $this->find ? Penduduk::where('nik', $this->find)->first()->id : null;

        $this->validate([
            'nomor' => 'required|numeric',
            'kepala_id' => 'nullable|unique:lingkungan_rt',
        ], [], [
            'nomor' => 'Nomor RT',
            'kepala_id' => 'Ketua RT',
        ]);

        $create = Rt::create([
            'rw_id' => $this->rw,
            'nomor' => $this->nomor,
            'kepala_id' => $this->kepala_id,
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

        $findPenduduk = Penduduk::where('nik', 'like', "%$this->find%")
                                    ->orWhere('nama', 'like', "%$this->find%")
                                    ->get();

        $finded = Penduduk::where('nik', $this->find)->first();

        return view('livewire.wilayah.rt.create', [
            'dusun' => $rw->lingkungan->nama,
            'rw' => $rw->nomor,
            'list' => $this->find ? $findPenduduk : [],
            'finded' => $finded
        ]);
    }
}
