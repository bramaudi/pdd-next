<?php

namespace App\Http\Controllers\Components;

use Livewire\Component;

class Sidebar extends Component
{
    public $dropdown = [
        'pengaturan' => false
    ];

    public function toggleDropdown($name)
    {
        $this->dropdown[$name] = !$this->dropdown[$name];
    }

    public function render()
    {
        return view('components.sidebar');
    }
}
