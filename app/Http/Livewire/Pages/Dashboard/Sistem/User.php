<?php

namespace App\Http\Livewire\Pages\Dashboard\Sistem;

use Livewire\Component;
use App\Models\User as Pengguna;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;

    protected $listeners = [
        'remountList' => 'render'
    ];

    public function render()
    {
        return view('livewire.pages.dashboard.sistem.user', [
            'users' => Pengguna::paginate(10)
        ]);
    }
}
