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
            'permission' => ['user.create', 'user.read', 'user.update', 'user.delete'],
            'icon' => 'settings',
            'name' => 'Pengaturan',
            'url' => [
                [
                    'icon' => 'users',
                    'name' => 'Pengguna',
                    'url' => '/dashboard/user'
                ]
            ]
        ],
    ];

    public function render()
    {
        return view('components.sidebar');
    }
}
