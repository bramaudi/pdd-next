<?php

namespace App\Http\Livewire\Wilayah;

use App\Models\Cluster\Lingkungan;
use App\Models\Kependudukan\Penduduk;
use Livewire\Component;

class Create extends Component
{
    public $nama, $kepala_id, $find;

    protected $listeners = ['modalClose'];

    public function modalClose()
    {
        $this->nama = null;
        $this->kepala_id = null;
        $this->find = null;
        $this->resetErrorBag();
    }

    public function submit()
    {
        $this->kepala_id = $this->find ? Penduduk::where('nik', $this->find)->first()->id : null;

        $validatedData = $this->validate([
            'nama' => 'required',
            'kepala_id' => 'nullable|unique:lingkungan'
        ], [], [
            'nama' => 'Nama Dusun',
            'kepala_id' => 'Kepala Dusun'
        ]);

        $create = Lingkungan::create($validatedData);

        if ($create) {
            $this->modalClose();
            $this->emit('remountList');
            $this->dispatchBrowserEvent('close-modals');
        } else {
            session()->flash('failed', 'Gagal menyimpan pembaruan.');
        }
    }

    public function render()
    {
        $findPenduduk = Penduduk::where('nik', 'like', "%$this->find%")
                                    ->orWhere('nama', 'like', "%$this->find%")
                                    ->get();

        $finded = Penduduk::where('nik', $this->find)->first();

        return view('livewire.wilayah.create', [
            'list' => $this->find ? $findPenduduk : [],
            'finded' => $finded,
        ]);
    }
}
