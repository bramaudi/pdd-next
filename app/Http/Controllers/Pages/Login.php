<?php

namespace App\Http\Controllers\Pages;

use Livewire\Component;
use App\Traits\LoginSubmit;

class Login extends Component
{
    use LoginSubmit;
    
    public function render()
    {
        return view('pages.login');
    }
}
