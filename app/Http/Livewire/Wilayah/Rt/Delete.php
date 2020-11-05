<?php

namespace App\Http\Livewire\Wilayah\Rt;

use App\Models\Kependudukan\Rt;
use Livewire\Component;

class Delete extends Component
{
    public $rt_id, $nomor;

    protected $listeners = ['loadData'];

    public function loadData($rt_id)
    {
        $model = Rt::findOrFail($rt_id);
        $this->rt_id = $rt_id;
        $this->nomor = $model->nomor;
    }

    public function submit()
    {
        Rt::find($this->rt_id)->delete();
        $this->emit('remountList');
        $this->dispatchBrowserEvent('close-modals');
    }

    public function render()
    {
        return view('livewire.wilayah.rt.delete');
    }
}
