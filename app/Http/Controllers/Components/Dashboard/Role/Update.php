<?php

namespace App\Http\Controllers\Components\Dashboard\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Update extends Component
{
    public $roleId;
    public $name;

    protected $listeners = ['loadData'];

    public function loadData($id)
    {
        $role = Role::find($id);
        $this->roleId = $id;
        $this->name = $role->name;
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|max:20'
        ]);

        $role = Role::find($this->roleId);

        // Update jika bukan Super Admin
        if ($role->name != 'Super Admin') {
            $role->name = $this->name;
            $role->save();
        }

        $this->emit('remount');
        $this->dispatchBrowserEvent('close-modals');
    }

    public function render()
    {
        return view('components.dashboard.role.update');
    }
}
