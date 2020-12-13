<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Update extends Component
{
    public $userId, $roles;
    public $loading = true;

    // Form Model
    public $name;
    public $username;
    public $email;
    public $role;

    protected $listeners = ['loadData', 'modalClose'];

    public function loadData($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $id;

        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->loading = false;
    }

    public function modalClose()
    {
        $this->userId = null;

        $this->name = null;
        $this->email = null;
        $this->username = null;
        $this->loading = true;
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

        // Mencegah jika "Operator" inspect form agar menjadi Super Admin
        if ($this->role != 'Super Admin') {
            if ($this->role == '-') {
                $user->syncRoles(); // kosongkan roles
            } else {
                $user->syncRoles($this->role);
            }
        }

        $user->save();

        $this->emit('remountList');
        $this->dispatchBrowserEvent('close-modals');
        $this->modalClose();
    }

    public function makeOptions()
    {
        $roles = [];
        $roleList = Role::where('name', '!=', 'Super Admin')->get();
        foreach ($roleList as $role) {
            $roles[] = [
                'value' => $role->name,
                'name' => $role->name,
            ];
        }

        return $roles;
    }

    public function render()
    {
        return view('livewire.user.update', [
            'roles' => $this->makeOptions()
        ]);
    }
}
