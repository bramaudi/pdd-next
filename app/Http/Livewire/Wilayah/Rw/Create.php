<?php

namespace App\Http\Livewire\Wilayah\Rw;

use App\Models\Cluster\Lingkungan;
use App\Models\Cluster\Rw;
use App\Models\Kependudukan\Penduduk;
use Livewire\Component;

class Create extends Component
{
    public $lingkungan, $nomor, $kepala_id, $find;

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
            'kepala_id' => 'nullable|unique:lingkungan_rw',
        ], [], [
            'nomor' => 'Nomor RW',
            'kepala_id' => 'Ketua RW',
        ]);

        $create = Rw::create([
            'lingkungan_id' => $this->lingkungan,
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
        $findPenduduk = Penduduk::where('nik', 'like', "%$this->find%")
                                    ->orWhere('nama', 'like', "%$this->find%")
                                    ->get();

        $finded = Penduduk::where('nik', $this->find)->first();

        return view('livewire.wilayah.rw.create', [
            'dusun' => Lingkungan::find($this->lingkungan)->nama,
            'list' => $this->find ? $findPenduduk : [],
            'finded' => $finded,
        ]);
    }
}
