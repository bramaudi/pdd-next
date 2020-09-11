<div>
    <button class="btn m-1" wire:click="$set('modal.add', true)">
        <i class="fas fa-plus"></i> Tambah Pengguna Baru
    </button>
    
    {{-- Modal Add --}}
    @if($modal['add'])
    <div class="modal card">
        <livewire:pages.dashboard.user.add />
    </div>
    @endif
    
    {{-- Modal Edit --}}
    @if($modal['edit'])
    <div class="modal card">
        <livewire:pages.dashboard.user.edit />
    </div>
    @endif
    
    {{-- Modal Delete --}}
    @if($modal['delete'])
    <div class="modal card">
        <livewire:pages.dashboard.user.delete />
    </div>
    @endif
    
    <div class="table-container">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Aksi</th>
                <th>Nama Pengguna</th>
                <th>Nama Lengkap</th>
                <th>Jabatan</th>
            </tr>
    
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>
                    <button class="edit" wire:click="openEditModal({{ $user->id }})"><i class="fas fa-edit"></i></button>
                    <button class="delete" wire:click="openDeleteModal({{ $user->id }})"><i class="fas fa-trash"></i></button>
                </td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

