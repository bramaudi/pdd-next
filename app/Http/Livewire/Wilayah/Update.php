<?php

namespace App\Http\Livewire\Wilayah;

use App\Models\Cluster\Lingkungan;
use App\Models\Kependudukan\Penduduk;
use Livewire\Component;

class Update extends Component
{
    public $dusun_id, $nama, $kepala_id, $find, $finded;
    public $loading = true;

    protected $listeners = ['loadData', 'modalClose'];

    public function loadData($id)
    {
        $model = Lingkungan::find($id);

        $this->dusun_id = $id;
        $this->nama = $model->nama;
        $this->kepala_id = $model->kepala_id;
        $this->find = $this->kepala_id ? $model->kepala->nik : null;
        $this->loading = false;
    }

    public function modalClose()
    {
        $this->dusun_id = null;
        $this->nama = null;
        $this->kepala_id = null;
        $this->find = null;
        $this->resetErrorBag();
        $this->loading = true;
    }

    public function submit()
    {
        $this->kepala_id = $this->finded ? $this->finded->id : null;
        
        if (empty($this->find)) {
            $this->kepala_id = null;
        }

        $this->validate([
            'nama' => 'required',
            'kepala_id' => 'nullable|unique:lingkungan,kepala_id,' . $this->dusun_id
        ], [], [
            'nama' => 'Nama Dusun',
            'kepala_id' => 'Kepala Dusun'
        ]);

        $model = Lingkungan::find($this->dusun_id);
        $model->nama = $this->nama;
        $model->kepala_id = $this->kepala_id;
        $update = $model->save();

        if ($update) {
            $this->modalClose();
            $this->emit('remountList');
            $this->dispatchBrowserEvent('close-modals');
        } else {
            session()->flash('failed', 'Gagal menyimpan pembaruan.');
        }
    }

    public function render()
    {
        $kepala_dusun = $this->kepala_id ? Penduduk::find(Lingkungan::find($this->dusun_id)->kepala_id) : false;

        $findPenduduk = Penduduk::where('nik', 'like', "%$this->find%")
                                    ->orWhere('nama', 'like', "%$this->find%")
                                    ->get();

        $this->finded = Penduduk::where('nik', $this->find)->first();

        return view('livewire.wilayah.update', [
            'list' => $this->find ? $findPenduduk : [],
            'finded' => $this->finded,
            'kepala_dusun' => $kepala_dusun,
        ]);
    }
}
