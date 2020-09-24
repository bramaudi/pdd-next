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

    {{-- Kata Sandi --}}
    <div class="form-group @error('password') has-error @enderror">
        <label class="form-label" for="inp-config-password">
            Kata Sandi:
        </label>
        <input wire:model="password" type="password" id="inp-config-password" class="form-input">
        @error('password') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>

    {{-- Konfirmasi Kata Sandi --}}
    <div class="form-group @error('password2') has-error @enderror">
        <label class="form-label" for="inp-config-password2">
            Konfirmasi Kata Sandi:
        </label>
        <input wire:model="password2" type="password" id="inp-config-password" class="form-input">
        @error('password') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>


    <x-submit text="Tambah" />

</form>
