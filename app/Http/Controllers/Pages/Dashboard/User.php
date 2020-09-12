<?php

namespace App\Http\Controllers\Pages\Dashboard;

use Livewire\Component;
use App\Models\User as UserModel;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;

    /**
     * Modal states
     */
    public $add, $edit, $del;

    protected $listeners = [
        'remountList' => 'render'
    ];

    public function render()
    {
        return view('pages.dashboard.user', [
            'users' => UserModel::paginate(10)
        ]);
    }
}
