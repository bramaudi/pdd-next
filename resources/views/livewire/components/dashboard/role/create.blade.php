<form wire:submit.prevent="submit">

    @include('livewire.includes/form-group', [
        'name' => 'name',
        'label' => 'Nama Jabatan',
        'type' => 'text'
    ])

    @include('livewire.includes/submit-button', ['text' => 'Buat'])

</form>
