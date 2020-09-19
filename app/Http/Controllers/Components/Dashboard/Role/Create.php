<?php

namespace App\Http\Controllers\Components\Dashboard\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public $name;

    public function submit()
    {
        $this->validate([
            'name' => 'required|max:20'
        ]);

        Role::create(['name' => $this->name]);

        $this->emit('remount');
        $this->dispatchBrowserEvent('close-modals');
    }

    public function render()
    {
        return view('components.dashboard.role.create');
    }
}
