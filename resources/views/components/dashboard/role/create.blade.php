<form wire:submit.prevent="submit">
    
    @include('includes/form-group', [
        'name' => 'name',
        'label' => 'Nama Jabatan',
        'type' => 'text'
    ])

    @include('includes/submit-button', ['text' => 'Buat'])

</form>