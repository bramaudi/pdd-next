<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class FormGroup extends Component
{
    public $randomId, $name, $label, $type;

    public function render()
    {
        $this->randomId = rand(00000, 99999);
        return view('livewire.components.form-group');
    }
}
