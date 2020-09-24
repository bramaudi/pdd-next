<form class="p-1" wire:submit.prevent="submit">

    <div class="form-group @error('pass_old') has-error @enderror">
        <label for="inp-chp-pass-old" class="form-label">
            Kata Sandi Lama
        </label>
        <input wire:model="pass_old" type="password" id="inp-chp-pass-old" class="form-input">
        @error('pass_old') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>

    <div class="form-group @error('pass_new') has-error @enderror">
        <label for="inp-chp-pass-new" class="form-label">
            Kata Sandi Baru
        </label>
        <input wire:model="pass_new" type="password" id="inp-chp-pass-new" class="form-input">
        @error('pass_new') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>

    <div class="form-group @error('pass_new2') has-error @enderror">
        <label for="inp-chp-pass-new2" class="form-label">
            Ulangi Kata Sandi
        </label>
        <input wire:model="pass_new2" type="password" id="inp-chp-pass-new2" class="form-input">
        @error('pass_new2') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>

    <button wire:target="submit" wire:loading.class="loading" class="btn btn-primary">
        Perbarui
    </button>

    @if(session()->has('success')) <div class="toast toast-success mt-2">{{ session('success') }}</div> @endif
    @if(session()->has('failed')) <div class="toast toast-error mt-2">{{ session('failed') }}</div> @endif

</form>
