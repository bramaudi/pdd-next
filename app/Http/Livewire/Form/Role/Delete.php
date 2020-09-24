<?php

namespace App\Http\Livewire\Form\Role;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Delete extends Component
{
    public $roleId;
    public $name;

    protected $listeners = ['loadData'];

    public function loadData($id)
    {
        $role = Role::findOrFail($id);
        $this->roleId = $id;
        $this->name = $role->name;
    }

    public function submit()
    {
        $role = Role::find($this->roleId);

        // Cegah hapus Super-Admin
        if ($role->name != 'Super Admin') {
            $role->delete();
        }

        $this->emit('remount');
        $this->dispatchBrowserEvent('close-modals');
    }

    public function render()
    {
        return view('livewire.form.role.delete');
    }
}
