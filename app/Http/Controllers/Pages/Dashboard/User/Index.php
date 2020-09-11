<?php

namespace App\Http\Controllers\Pages\Dashboard\User;

use Livewire\Component;
use App\Models\User;

class Index extends Component
{
    public $users;

    public $modal = [
        'add' => null,
        'edit' => null,
        'delete' => null,
    ];

    protected $listeners = [
        'remountList' => 'render',
        'closeModalAdd',
        'closeModalEdit',
        'closeModalDelete',
    ];

    public function closeModalAdd()
    {
        $this->modal['add'] = null;
    }

    public function closeModalEdit()
    {
        $this->modal['edit'] = null;
    }

    public function closeModalDelete()
    {
        $this->modal['delete'] = null;
    }

    public function openEditModal($id)
    {
        $this->modal['edit'] = $id;
        $this->emit('loadEditData', $id);
    }

    public function openDeleteModal($id)
    {
        $this->modal['delete'] = $id;
        $this->emit('loadDeleteData', $id);
    }

    public function render()
    {
        $this->users = User::all();
        return view('pages.dashboard.user.index');
    }
}
