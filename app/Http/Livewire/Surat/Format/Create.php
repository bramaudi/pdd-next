<?php

namespace App\Http\Livewire\Surat\Format;

use App\Models\Surat\SuratFormat;
use Livewire\Component;

class Create extends Component
{
    public ?string $name;
    public ?string $prefix;
    public ?string $description;

    protected array $rules = [
        'name'      => 'required|min:6',
        'prefix'    => 'required',
        'description' => 'required',
    ];

    public function submit()
    {
        $this->validate();

        SuratFormat::create([
            "name"          => $this->name,
            "prefix"        => $this->prefix,
            "description"   => $this->description
        ]);

        $this->emit('remount');

        $this->dispatchBrowserEvent('close-modals');
    }

    public function render()
    {
        return view('livewire.surat.format.create');
    }
}
