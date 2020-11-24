<?php

namespace App\Http\Livewire\Surat\Format;

use App\Models\Surat\Format\Format;
use Livewire\Component;

class Delete extends Component
{
    public $name, $prefix;

    public ?Format $format;

    protected $listeners = ["loadData"];

    public function loadData(Format $format): void
    {
        $this->fill($format);
        $this->fill(compact('format'));
    }

    public function submit(): void
    {
        $this->format->delete();

        $this->emitTo('surat.format.table', 'refresh');

        $this->dispatchBrowserEvent('close-modals');
    }

    public function render()
    {
        return view('livewire.surat.format.delete');
    }
}
