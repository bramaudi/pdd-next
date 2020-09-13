<?php

namespace App\Http\Controllers\Pages\Dashboard;

use Livewire\Component;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends Component
{
    public function render()
    {
        return view('pages.dashboard.role', [
            'roles' => ModelsRole::with('permissions')->get(),
        ]);
    }
}
