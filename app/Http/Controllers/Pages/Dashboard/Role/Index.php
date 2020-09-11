<?php

namespace App\Http\Controllers\Pages\Dashboard\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public $roles;

    public function render()
    {
        $this->roles = Role::all();
        
        return view('pages.dashboard.role.index');
    }
}
