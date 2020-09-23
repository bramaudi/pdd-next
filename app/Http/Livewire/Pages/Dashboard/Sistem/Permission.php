<?php

namespace App\Http\Livewire\Pages\Dashboard\Sistem;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Permission extends Component
{
    public $role;

    /**
     * Penamaan Permission
     */
    public $parents = [
        'user' => 'Pengguna',
        'config' => 'Info Desa'
    ];

    /**
     * Rincian Permission @array
     */
    public $user = [
        'create' => null,
        'read' => null,
        'update' => null,
        'delete' => null,
    ];
    public $config = [
        'read' => null,
        'update' => null,
    ];

    /**
     * Inisiasi nilai
     */
    public function mount($roleId = 0)
    {
        if (!$roleId) {
            return redirect()->to('/dashboard/role');
        }

        $this->roleId = $roleId;
        $this->role = Role::find($roleId);

        $this->getCurrent();
    }

    /**
     * Muat nilai yang tersimpan dari database
     */
    public function getCurrent()
    {
        foreach(array_keys($this->parents) as $parentKey) {
            foreach(array_keys($this->$parentKey) as $actions) {
                if ($this->role->hasPermissionTo($parentKey . '.' . $actions)) {
                    $this->$parentKey[$actions] = true;
                }
            }
        }
    }

    /**
     * Perbarui nilai ke database
     */
    public function submit()
    {
        foreach(array_keys($this->parents) as $parentKey) {
            foreach(array_keys($this->$parentKey) as $actions) {
                $this->$parentKey[$actions]
                    ? $this->role->givePermissionTo($parentKey . '.' . $actions)
                    : $this->role->revokePermissionTo($parentKey . '.' . $actions);
            }
        }

        session()->flash('success', 'Hak akses telah diperbarui');
    }

    public function resetChanges()
    {
        foreach(array_keys($this->parents) as $parentKey) {
            foreach(array_keys($this->$parentKey) as $actions) {
                $this->$parentKey[$actions] = null;
            }
        }

        $this->getCurrent();
    }

    public function render()
    {
        return view('livewire.pages.dashboard.sistem.permission');
    }
}
