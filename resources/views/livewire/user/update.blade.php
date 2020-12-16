<form wire:submit.prevent="submit">

    @if($loading)

    <div class="loading loading-lg"></div>

    @else

    <x-form-group model="username">
        Nama Pengguna:
    </x-form-group>

    <x-form-group model="email" type="email">
        Email:
    </x-form-group>

    <x-form-group model="name">
        Nama Lengkap:
    </x-form-group>

    <x-form-group-select model="role" :option="$roles">
        Jabatan:
    </x-form-group-select>

    <x-submit text="Simpan" />

    @endif

</form>
