<?php

namespace App\Http\Livewire\Components\Dashboard\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Create extends Component
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

        $this->emit('remountList');
        $this->dispatchBrowserEvent('close-modals');
        $this->resetInputs();
    }

    public function render()
    {
        return view('livewire.components.dashboard.user.create');
    }
}
