<?php

namespace App\Http\Controllers\Pages\Dashboard;

use Livewire\Component;
use Spatie\Permission\Models\Role as RoleModel;

class Role extends Component
{
    public $roles;

    public function render()
    {
        $this->roles = RoleModel::all();
        
        return view('pages.dashboard.role');
    }
}
