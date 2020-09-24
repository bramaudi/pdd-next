<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $state = false;
    public $header = null;
    public $slot = null;
    public $footer = null;

    public function render()
    {
        return view('livewire.modal');
    }
}
