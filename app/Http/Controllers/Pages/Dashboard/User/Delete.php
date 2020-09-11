<?php

namespace App\Http\Controllers\Pages\Dashboard\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Delete extends Component
{
    public $userId;
    public $name;

    protected $listeners = ['loadDeleteData'];

    public function loadDeleteData($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $id;
        $this->name = $user->name;
    }

    public function submit()
    {
        $user = User::findOrFail($this->userId);

        // cegah hapus akun sendiri
        if (Auth::user()->id != $user->id) {
            $user->delete();
        }

        $this->emit('remountList');
        $this->close();
    }

    public function close()
    {
        $this->emit('closeModalDelete');
    }

    public function render()
    {
        return view('pages.dashboard.user.delete');
    }
}
