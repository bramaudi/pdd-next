<form wire:submit.prevent="submit" class="pb-2">

    <x-form-group model="name">
        Nama Format <span class="text-error">*</span>:
    </x-form-group>

    <x-form-group model="prefix">
        Kode Format <span class="text-error">*</span>:
    </x-form-group>

    <x-form-group type="textarea" model="description">
        Deskripsi <span class="text-error">*</span>:
    </x-form-group>

    <x-submit text="Simpan" />

</form>
