<form wire:submit.prevent="submit" class="pb-2">
    @if($dataLoaded)
        
        @include('includes/form-group', [
            'name' => 'username',
            'label' => 'Nama Pengguna',
            'type' => 'text'
        ])

        @include('includes/form-group', [
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email'
        ])
        
        @include('includes/form-group', [
            'name' => 'name',
            'label' => 'Nama Lengkap',
            'type' => 'text'
        ])

        <div class="form-group">
            <label class="form-label" for="inp-edit-role">Jabatan:</label>
            <select class="form-select" id="inp-edit-role" wire:model="role">
                <option value="">--</option>
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