<?php

namespace App\Http\Controllers\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $username;
    public $password;

    public function submit()
    {
        $this->validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Nama Pengguna / Email harus diisi.',
            'password.required' => 'Kata Sandi harus diisi.'
        ]);

        // Periksa apakah input "username" adalah email atau tidak
        $fieldType = filter_var($this->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $login = Auth::attempt([
            $fieldType => $this->username,
            'password' => $this->password
        ]);

        if ($login) {
            return redirect()->to('/dashboard');
        } else {
            session()->flash('failed', 'Akun tidak ditemukan');
        }
    }
    
    public function render()
    {
        return view('pages.login');
    }
}
