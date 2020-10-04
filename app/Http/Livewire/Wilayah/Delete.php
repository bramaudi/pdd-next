<?php

namespace App\Http\Livewire\Wilayah;

use App\Models\Cluster\Lingkungan;
use App\Models\Cluster\Rt;
use App\Models\Cluster\Rw;
use Livewire\Component;

class Delete extends Component
{
    public $dusun_id, $name;

    protected $listeners = ['loadData'];

    public function loadData($id)
    {
        $model = Lingkungan::findOrFail($id);
        $this->dusun_id = $id;
        $this->name = $model->nama;
    }

    public function submit()
    {
        $dusun = Lingkungan::findOrFail($this->dusun_id);
        // Hapus RW
        foreach ($dusun->rw as $rw) {
            // Hapus RT
            foreach ($rw->rt as $rt) {
                Rt::find($rt->id)->delete();
            }
            Rw::find($rw->id)->delete();
        }
        // Hapus Dusun
        $dusun->delete();

        $this->emit('remountList');
        $this->dispatchBrowserEvent('close-modals');
    }

    public function render()
    {
        return view('livewire.wilayah.delete');
    }
}
