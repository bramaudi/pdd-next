<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Update extends Component
{
    public $roleId;
    public $name;
    public $loading = 'true';

    protected $listeners = ['loadData', 'modalClose'];

    public function loadData($id)
    {
        $role = Role::find($id);
        $this->roleId = $id;
        $this->name = $role->name;
        $this->loading = false;
    }

    public function modalClose()
    {
        $this->loading = false;
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

        $this->name = '';
        $this->emit('remount');
        $this->dispatchBrowserEvent('close-modals');
    }

    public function render()
    {
        return view('livewire.role.update');
    }
}
