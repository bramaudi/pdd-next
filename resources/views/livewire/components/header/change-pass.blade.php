<form class="p-1" wire:submit.prevent="submitGantiSandi">

    @include('livewire.includes/form-group', [
        'name' => 'pass_old',
        'label' => 'Kata Sandi Lama',
        'type' => 'password'
    ])

    @include('livewire.includes/form-group', [
        'name' => 'pass_new',
        'label' => 'Kata Sandi Baru',
        'type' => 'password'
    ])

    @include('livewire.includes/form-group', [
        'name' => 'pass_new2',
        'label' => 'Ulangi Kata Sandi',
        'type' => 'password'
    ])

    @include('livewire.includes/submit-button', ['text' => 'Ganti Kata Sandi'])

</form>
