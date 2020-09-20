<?php

namespace App\Http\Controllers\Pages\Dashboard;

use App\Models\Label\Label;
use App\Models\Penduduk\Penduduk as PendudukPenduduk;
use Livewire\Component;
use Livewire\WithPagination;

class Penduduk extends Component
{
    use WithPagination;

    public function render()
    {
        return view('pages.dashboard.penduduk', [
            'listPenduduk' => PendudukPenduduk::paginate(10)
        ]);
    }
}
