<form wire:submit.prevent="submit" class="card form">
    
    {{-- User --}}
    <div class="mb-3">
        <label class="block" for="inp-login-f-user">
            Email / Username / NIK:
        </label>
        <input wire:model="username" type="text" class="input w-full" id="inp-login-f-user">
        @error('username') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>

    {{-- Passwud --}}
    <div class="mb-3">
        <label class="block" for="inp-login-f-user">
            Kata Sandi:
        </label>
        <input wire:model="password" type="password" class="input w-full" id="inp-login-f-user">
        @error('password') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>

    <x-submit text="Masuk" />

</form>