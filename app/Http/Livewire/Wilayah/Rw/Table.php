<?php

namespace App\Http\Livewire\Wilayah\Rw;

use App\Models\Cluster\Rw;
use App\Models\Label\Label;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    
    public $lingkungan;

    protected $listeners = ['remountList' => 'render'];

    public function render()
    {
        return view('livewire.wilayah.rw.table', [
            'list' => Rw::where('lingkungan_id', $this->lingkungan)->paginate(10),
            'pria_id' => Label::whereLabel('L')->first()->id,
            'wanita_id' => Label::whereLabel('P')->first()->id,
        ]);
    }
}
