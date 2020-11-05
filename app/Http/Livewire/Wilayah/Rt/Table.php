<?php

namespace App\Http\Livewire\Wilayah\Rt;

use App\Models\Cluster\Rt;
use App\Models\Label\Label;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    
    public $rw;

    protected $listeners = ['remountList' => 'render'];

    public function render()
    {
        return view('livewire.wilayah.rt.table', [
            'list' => Rt::where('rw_id', $this->rw)->paginate(10),
            'pria_id' => Label::whereLabel('L')->first()->id,
            'wanita_id' => Label::whereLabel('P')->first()->id,
        ]);
    }
}
