<?php

namespace App\Http\Controllers\Components;

use Livewire\Component;

class Sidebar extends Component
{
    public $links = [
        [
            'icon' => 'activity',
            'name' => 'Dashboard',
            'url' => '/dashboard'
        ],
        [
            'role' => 'Super Admin',
            'icon' => 'settings',
            'name' => 'Pengaturan',
            'url' => [
                [
                    'icon' => 'users',
                    'name' => 'Pengguna',
                    'url' => '/dashboard/user'
                ],
                [
                    'icon' => 'lock',
                    'name' => 'Jabatan',
                    'url' => '/dashboard/role'
                ],
            ]
        ],
    ];

    public function render()
    {
        return view('components.sidebar');
    }
}
