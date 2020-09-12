<?php

namespace App\Http\Controllers\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public $gravatar;
    public $state = [
        'menu' => true,
        'login' => false
    ];

    public function mount()
    {
        if (Auth::user()) {
            $this->gravatar = 'https://www.gravatar.com/avatar/'. md5(Auth::user()->email);
        }
    }

    public function logout()
    {
        Auth::logout();
    }

    public function toggleLogin()
    {
        $this->toggleMenu();
        $this->state['login'] = !$this->state['login'];
    }

    public function toggleMenu()
    {
        $this->state['menu'] = !$this->state['menu'];
    }

    public function render()
    {
        return view('components.header');
    }
}
