<?php

namespace App\Http\Controllers\Components;

use Livewire\Component;

class Sidebar extends Component
{
    public $links = [
        [
            'icon' => 'chart-line',
            'name' => 'Dashboard',
            'url' => '/dashboard'
        ],
        [
            'icon' => 'info',
            'name' => 'Info Desa',
            'url' => [
                [
                    'icon' => 'id-card',
                    'name' => 'Identitas Desa',
                    'url' => '/dashboard/config'
                ]
            ]
        ],
        [
            'permission' => ['user.create', 'user.read', 'user.update', 'user.delete'],
            'icon' => 'cog',
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
