<form wire:submit.prevent="submit" class="pb-2">

    <x-form-group model="username">
        Nama Pengguna:
    </x-form-group>

    <x-form-group model="email" type="email">
        Email:
    </x-form-group>

    <x-form-group model="name">
        Nama Lengkap:
    </x-form-group>

    <x-form-group model="password" type="password">
        Kata Sandi:
    </x-form-group>

    <x-form-group model="password2" type="password">
        Konfirmasi Kata Sandi:
    </x-form-group>

    <x-submit text="Tambah" />

</form>
