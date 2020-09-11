<form wire:submit.prevent="submit" class="p-1">
    <label for="inp-edit-username">Nama Pengguna:</label>
    <input type="text" id="inp-edit-username" wire:model="username">
    @error('username') <div class="input-hint">{{ $message }}</div> @enderror

    <label for="inp-edit-email">Email:</label>
    <input type="email" id="inp-edit-email" wire:model="email">
    @error('email') <div class="input-hint">{{ $message }}</div> @enderror

    <label for="inp-edit-name">Nama Lengkap:</label>
    <input type="text" id="inp-edit-name" wire:model="name">
    @error('name') <div class="input-hint">{{ $message }}</div> @enderror

    <label for="inp-edit-role">Jabatan:</label>
    <select id="inp-edit-role" wire:model="role">
        <option value="">(Tidak Diubah)</option>
        <option value="-">Tidak Ada</option>
        @foreach($roles as $role)
        <option value="{{ $role->name }}">{{ $role->name }}</option>
        @endforeach
    </select>
    
    <button class="btn">Simpan</button>
    <button class="btn" type="button" wire:click="close">Tutup</button>
</form>
