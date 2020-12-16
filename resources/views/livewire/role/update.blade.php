<form wire:submit.prevent="submit">

    @if($loading)

        <div class="loading loading-lg"></div>

    @else
    
        <x-form-group model="name">
            Nama Jabatan:
        </x-form-group>

        <x-submit text="Simpan" />

    @endif

</form>
