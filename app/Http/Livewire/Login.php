<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $username;
    public $password;

    protected $rules = [
        'username' => 'required',
        'password' => 'required'
    ];

    public function submit(): void
    {
        $this->validate();

        // Periksa apakah input "username" adalah email atau tidak
        $fieldType = filter_var($this->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $login = Auth::attempt([
            $fieldType => $this->username,
            'password' => $this->password
        ]);

        if ($login) {
            redirect()->to('/dashboard');
        } else {
            session()->flash('failed', 'Akun tidak ditemukan');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
