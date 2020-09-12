<?php

namespace App\Http\Controllers\Pages\Dashboard;

use Livewire\Component;
use App\Models\User as UserModel;

class User extends Component
{
    public $users;

    public $modal = [
        'add' => false,
        'edit' => null,
        'delete' => null,
    ];

    protected $listeners = [
        'remountList' => 'render',
        'closeActiveModals'
    ];

    public function closeActiveModals()
    {
        $this->modal['add'] = null;
        $this->modal['edit'] = null;
        $this->modal['delete'] = null;
    }

    public function openModal($action, $value)
    {
        $this->modal[$action] = $value;
        $this->emit('loadData', $value);
    }

    public function render()
    {
        $this->users = UserModel::all();
        return view('pages.dashboard.user');
    }
}
