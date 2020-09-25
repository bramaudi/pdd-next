<?php

namespace App\Http\Livewire\Keluarga;

use Livewire\Component;

class Create extends Component
{
    public $name;
    
    public function render()
    {
        return view('livewire.keluarga.create');
    }
}
