<form wire:submit.prevent="submit" class="pb-2">

    {{-- Username --}}
    <div class="form-group @error('username') has-error @enderror">
        <label class="form-label" for="inp-config-username">
            Nama Pengguna:
        </label>
        <input wire:model="username" type="text" id="inp-config-username" class="form-input">
        @error('username') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>

    {{-- Email --}}
    <div class="form-group @error('email') has-error @enderror">
        <label class="form-label" for="inp-config-email">
            Email:
        </label>
        <input wire:model="email" type="email" id="inp-config-email" class="form-input">
        @error('email') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>

    {{-- Nama Lengkap --}}
    <div class="form-group @error('name') has-error @enderror">
        <label class="form-label" for="inp-config-name">
            Nama Lengkap:
        </label>
        <input wire:model="name" type="text" id="inp-config-name" class="form-input">
        @error('name') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>


    <div class="form-group">
        <label class="form-label" for="inp-edit-role">Jabatan:</label>
        <select class="form-select" id="inp-edit-role" wire:model="role">
            <option value="">--</option>
            @foreach($roles as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>

    <x-submit text="Simpan" />

</form>
