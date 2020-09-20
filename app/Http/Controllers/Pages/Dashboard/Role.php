<?php

namespace App\Http\Controllers\Pages\Dashboard;

use Livewire\Component;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends Component
{
    protected $listeners = ['remount' => 'render'];

    public function render()
    {
        return view('pages.dashboard.role', [
            'roles' => ModelsRole::where('reserved', 0)->with('permissions')->get(),
        ]);
    }
}
