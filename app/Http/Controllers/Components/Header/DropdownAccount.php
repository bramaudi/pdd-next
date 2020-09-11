<?php

namespace App\Http\Controllers\Components\Header;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class DropdownAccount extends Component
{
    use AuthorizesRequests;

    public $auth;

    public function mount()
    {
        $this->auth = Auth::user();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }

    public function render()
    {
        return view('components.header.dropdown-account');
    }
}
