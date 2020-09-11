<form wire:submit.prevent="submit" class="p-2">
    <label for="inp-add-username">Nama Pengguna</label>
    <input type="text" id="inp-add-username" wire:model="username">
    @error('username') <div class="input-hint">{{ $message }}</div> @enderror

    <label for="inp-add-email">Email</label>
    <input type="text" id="inp-add-email" wire:model="email">
    @error('email') <div class="input-hint">{{ $message }}</div> @enderror

    <label for="inp-add-name">Nama Lengkap</label>
    <input type="text" id="inp-add-name" wire:model="name">
    @error('name') <div class="input-hint">{{ $message }}</div> @enderror

    <label for="inp-add-pass">Kata Sandi</label>
    <input type="password" id="inp-add-pass" wire:model="password">
    @error('password') <div class="input-hint">{{ $message }}</div> @enderror

    <label for="inp-add-pass2">Konfirmasi Kata Sandi</label>
    <input type="password" id="inp-add-pass2" wire:model="password2">
    @error('password2') <div class="input-hint">{{ $message }}</div> @enderror

    <button class="btn">Simpan</button>
    <button class="btn" type="button" wire:click="close">Batal</button>
</form>