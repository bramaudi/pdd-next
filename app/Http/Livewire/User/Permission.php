<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Permission extends Component
{
    public $roleId;
    public $changed = false;
    public $permissions = [
        'desa_identitas' => false,
        'desa_wilayah' => false,
        'kependudukan_penduduk' => false,
        'kependudukan_keluarga' => false,
        'sistem_pengguna' => false,
        'sistem_jabatan' => false,
    ];

    public function mount($roleId)
    {
        $this->roleId = $roleId;
        $role = Role::findById($roleId);
        foreach ($this->permissions as $key => $val) {
            $this->permissions[$key] = $role->hasPermissionTo($key);
        }
    }

    public function changed()
    {
        $this->changed = true;
    }

    public function submit()
    {
        $role = Role::find($this->roleId);
        foreach ($this->permissions as $key => $val) {
            $val
                ? $role->givePermissionTo($key)
                : $role->revokePermissionTo($key);
        }
        $this->changed = false;

        session()->flash('success', 'Pembaruan berhasil tersimpan');
    }

    public function resetChanges()
    {
        $this->mount($this->roleId);
        $this->changed = false;
    }

    public function render()
    {
        return view('livewire.user.permission');
    }
}
