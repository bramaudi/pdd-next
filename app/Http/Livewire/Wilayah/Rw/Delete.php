<?php

namespace App\Http\Livewire\Wilayah\Rw;

use App\Models\Cluster\Rw;
use Livewire\Component;

class Delete extends Component
{
    public $rw_id, $nomor;

    protected $listeners = ['loadData'];

    public function loadData($id)
    {
        $model = Rw::findOrFail($id);
        $this->rw_id = $id;
        $this->nomor = $model->nomor;
    }

    public function submit()
    {
        $model = Rw::findOrFail($this->rw_id);
        $model->delete();

        $this->emit('remountList');
        $this->dispatchBrowserEvent('close-modals');
    }

    public function render()
    {
        return view('livewire.wilayah.rw.delete');
    }
}
