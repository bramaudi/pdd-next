<?php

namespace App\Http\Livewire\Components\Dashboard\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Delete extends Component
{
    public $userId;
    public $name;

    protected $listeners = ['loadData'];

    public function loadData($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $id;
        $this->name = $user->name;
    }

    public function submit()
    {
        $user = User::findOrFail($this->userId);

        // cegah hapus akun sendiri / durhaka kpd Super Admin
        if (Auth::user()->id != $user->id && !$user->hasRole('Super Admin')) {
            $user->delete();
        }

        $this->emit('remountList');
        $this->dispatchBrowserEvent('close-modals');
    }

    public function render()
    {
        return view('livewire.components.dashboard.user.delete');
    }
}
