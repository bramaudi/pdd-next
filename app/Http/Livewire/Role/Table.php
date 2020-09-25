<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Table extends Component
{
    protected $listeners = ['remount' => 'render'];

    public function render()
    {
        return view('livewire.role.table', [
            'roles' => Role::where('reserved', 0)->with('permissions')->get(),
            'systemRoles' => Role::where('reserved', 1)->with('permissions')->get(),
        ]);
    }
}
