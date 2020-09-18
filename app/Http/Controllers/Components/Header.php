<?php

namespace App\Http\Controllers\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public $gravatar;

    public function mount()
    {
        if (Auth::user()) {
            $this->gravatar = 'https://www.gravatar.com/avatar/'. md5(Auth::user()->email);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/login');
    }

    public function render()
    {
        return view('components.header');
    }
}
