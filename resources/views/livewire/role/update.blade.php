<form wire:submit.prevent="submit">

    @if($loading)

        <div class="loading loading-lg"></div>

    @else
    
        {{-- Nama Jabatan --}}
        <div class="form-group @error('name') has-error @enderror">
            <label class="form-label" for="inp-config-name">
                Nama Jabatan:
            </label>
            <input wire:model="name" type="text" id="inp-config-password" class="form-input">
            @error('name') <div class="form-input-hint">{{ $message }}</div> @enderror
        </div>

        <x-submit text="Simpan" />

    @endif

</form>
