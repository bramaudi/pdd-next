<?php

namespace App\Http\Controllers\Components;

use Livewire\Component;

class FormGroup extends Component
{
    public $randomId, $name, $label, $type;

    public function render()
    {
        $this->randomId = rand(00000, 99999);
        return view('components.form-group');
    }
}
