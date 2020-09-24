<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;
use App\Models\User as ModelUser;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;

    protected $listeners = [
        'remountList' => 'render'
    ];

    public function render()
    {
        return view('livewire.table.user', [
            'list' => ModelUser::paginate(10)
        ]);
    }
}
