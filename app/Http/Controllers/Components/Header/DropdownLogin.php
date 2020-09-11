<?php

namespace App\Http\Controllers\Components\Header;

use Livewire\Component;
use App\Traits\LoginSubmit;

class DropdownLogin extends Component
{
    use LoginSubmit;
    
    public function close()
    {
        $this->dispatchBrowserEvent('close-dropdown-login');
    }

    public function render()
    {
        return view('components.header.dropdown-login');
    }
}
