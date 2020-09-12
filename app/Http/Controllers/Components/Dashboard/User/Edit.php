<?php

namespace App\Http\Controllers\Components\Dashboard\User;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public $userId;
    public $roles;

    // Form Model
    public $name;
    public $username;
    public $email;
    public $role;

    protected $listeners = ['loadData'];

    public function loadData($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $id;

        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users,email,'.$this->userId,
            'username' => 'required|min:5|max:20|unique:users,username,'.$this->userId,
        ]);

        $user = User::findOrFail($this->userId);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->username = $this->username;
        
        if ($this->role == '-') {
            $user->syncRoles(); // kosongkan roles
        } else {
            $user->assignRole($this->role);
        }

        $user->save();

        $this->emit('remountList');
        $this->close();
    }

    public function close()
    {
        $this->emit('closeActiveModals');
    }

    public function render()
    {
        $this->roles = Role::all();
        return view('components.dashboard.user.edit');
    }
}
