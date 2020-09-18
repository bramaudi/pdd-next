<form wire:submit.prevent="submit" class="pb-2">
    @if($dataLoaded)
        <div class="form-group">
            <label class="form-label" for="inp-edit-username">Nama Pengguna:</label>
            <input class="form-input" type="text" id="inp-edit-username" wire:model="username">
            @error('username') <div class="form-input-hint">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="inp-edit-email">Email:</label>
            <input class="form-input" type="email" id="inp-edit-email" wire:model="email">
            @error('email') <div class="form-input-hint">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="inp-edit-name">Nama Lengkap:</label>
            <input class="form-input" type="text" id="inp-edit-name" wire:model="name">
            @error('name') <div class="form-input-hint">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="inp-edit-role">Jabatan:</label>
            <select class="form-input" id="inp-edit-role" wire:model="role">
                <option value="">(Tidak Diubah)</option>
                <option value="-">Tidak Ada</option>
                @foreach($roles as $role)
                <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        
        @include('includes/submit-button', ['text' => 'Simpan'])
    @else
        <div class="loading loading-lg d-center"></div>
    @endif
</form>