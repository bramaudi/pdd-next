<?php

namespace App\Http\Livewire\Surat\Format;

use App\Models\Surat\Format\Format;
use Livewire\Component;

class Create extends Component
{
    public ?string $name;
    public ?string $prefix;

    protected array $rules = [
        'name'      => 'required|min:6',
        'prefix'    => 'required',
    ];

    public function submit()
    {
        $this->validate();

        Format::create([
            "name"          => $this->name,
            "prefix"        => $this->prefix
        ]);

        $this->emit('rerender');

        $this->dispatchBrowserEvent('close-modals');

        unset($this->name, $this->prefix);
    }

    public function render()
    {
        return view('livewire.surat.format.create');
    }
}
