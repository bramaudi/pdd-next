<form wire:submit.prevent="submit" class="pb-2">
    <div class="form-group @error('username') has-error @enderror">
        <label class="form-label" for="inp-add-username">Nama Pengguna</label>
        <input class="form-input" type="text" id="inp-add-username" wire:model="username">
        @error('username') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>

    <div class="form-group @error('email') has-error @enderror"">
        <label class="form-label" for="inp-add-email">Email</label>
        <input class="form-input" type="text" id="inp-add-email" wire:model="email">
        @error('email') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>

    <div class="form-group @error('name') has-error @enderror"">
        <label class="form-label" for="inp-add-name">Nama Lengkap</label>
        <input class="form-input" type="text" id="inp-add-name" wire:model="name">
        @error('name') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>

    <div class="form-group @error('password') has-error @enderror"">
        <label class="form-label" for="inp-add-pass">Kata Sandi</label>
        <input class="form-input" type="password" id="inp-add-pass" wire:model="password">
        @error('password') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>

    <div class="form-group @error('password2') has-error @enderror"">
        <label class="form-label" for="inp-add-pass2">Konfirmasi Kata Sandi</label>
        <input class="form-input" type="password" id="inp-add-pass2" wire:model="password2">
        @error('password2') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="submit">Simpan</button>
        <button class="btn" type="button" wire:click="close">Batal</button>
        <progress class="progress" max="100" wire:loading wire:target="submit"></progress>
    </div>

</form>