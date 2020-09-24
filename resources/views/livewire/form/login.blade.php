<form wire:submit.prevent="submit">
    
    {{-- User --}}
    <div class="form-group @error('username') has-error @enderror">
        <label class="form-label" for="inp-login-f-user">
            Email / Username / NIK:
        </label>
        <input wire:model="username" type="text" class="form-input" id="inp-login-f-user">
        @error('username') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>

    {{-- Passwud --}}
    <div class="form-group @error('password') has-error @enderror">
        <label class="form-label" for="inp-login-f-user">
            Kata Sandi:
        </label>
        <input wire:model="password" type="password" class="form-input" id="inp-login-f-user">
        @error('password') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>

    <x-submit text="Masuk" />

</form>