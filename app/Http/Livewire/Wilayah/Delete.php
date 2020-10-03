<?php

namespace App\Http\Livewire\Wilayah;

use App\Models\Cluster\Lingkungan;
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
        $model = Lingkungan::findOrFail($this->dusun_id);
        $model->delete();

        $this->emit('remountList');
        $this->dispatchBrowserEvent('close-modals');
    }

    public function render()
    {
        return view('livewire.wilayah.delete');
    }
}
