<form wire:submit.prevent="submit" class="pb-2">

    @include('livewire.includes/form-group', [
        'name' => 'username',
        'label' => 'Nama Pengguna',
        'type' => 'text'
    ])

    @include('livewire.includes/form-group', [
        'name' => 'email',
        'label' => 'Email',
        'type' => 'email'
    ])

    @include('livewire.includes/form-group', [
        'name' => 'name',
        'label' => 'Nama Lengkap',
        'type' => 'text'
    ])

    @include('livewire.includes/form-group', [
        'name' => 'password',
        'label' => 'Kata Sandi',
        'type' => 'password'
    ])

    @include('livewire.includes/form-group', [
        'name' => 'password2',
        'label' => 'Konfirmasi Kata Sandi',
        'type' => 'password'
    ])

    @include('livewire.includes/submit-button', ['text' => 'Tambah'])

</form>
