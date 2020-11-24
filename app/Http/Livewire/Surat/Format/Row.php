<?php

namespace App\Http\Livewire\Surat\Format;

use App\Models\Surat\Format\Format;
use Livewire\Component;

class Row extends Component
{
    public Format $data;

    public function mount(Format $data)
    {
        $this->data = $data;
    }

    public function hideToggle()
    {
        $this->data->update(['active' => !$this->data->active]);
    }

    public function render()
    {
        return view('livewire.surat.format.row');
    }
}
