<form wire:submit.prevent="submit" class="pb-2">
    <div class="form-group">
        <label class="form-label">Dusun:</label>
        <input class="form-input" type="text" value="{{ $dusun }}" disabled>
    </div>

    <x-form-group model="nomor">
        Nomor RW:
    </x-form-group>

    <x-submit text="Buat" />
</form>
