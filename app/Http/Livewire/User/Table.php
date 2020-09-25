<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User as ModelUser;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    protected $listeners = [
        'remountList' => 'render'
    ];

    public function render()
    {
        return view('livewire.user.table', [
            'list' => ModelUser::paginate(10)
        ]);
    }
}
