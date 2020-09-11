<?php

namespace App\Http\Controllers\Pages\Dashboard\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Add extends Component
{
    public $username;
    public $email;
    public $name;
    public $password;
    public $password2;

    public function resetInputs()
    {
        $this->username = '';
        $this->email = '';
        $this->name = '';
        $this->password = '';
        $this->password2 = '';
    }

    public function submit()
    {
        $validatedData = $this->validate(
            [
                'username' => 'required|unique:users|min:5|max:20',
                'email' => 'required|unique:users|email',
                'name' => 'required|min:3|max:20',
                'password' => 'required|password',
                'password2' => 'required|same:password'
            ]
        );

        // Hash dulu passwordnya
        $validatedData['password'] = Hash::make($this->password);

        User::create($validatedData);

        $this->resetInputs();
        $this->emit('remountList');
        $this->close();
    }

    public function close()
    {
        $this->emit('closeModalAdd');
    }

    public function render()
    {
        return view('pages.dashboard.user.add');
    }
}
