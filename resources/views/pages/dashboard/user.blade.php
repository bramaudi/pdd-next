<div class="container py-2" x-data>
    <button class="btn m-1" wire:click="openModal('add', true)">
        <i class="icon icon-plus mr-1"></i> Tambah Pengguna Baru
    </button>

    <!-- Modal Add -->
    <div class="modal" :class="{ 'active': $wire.modal.add }">
        <a href="#close" wire:click="closeActiveModals" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" wire:click="closeActiveModals" class="btn btn-clear float-right" aria-label="Close"></a>
                <div class="modal-title h5">Tambah Pengguna Baru</div>
            </div>
            <div class="modal-body">
                <div class="content">
                    <livewire:components.dashboard.user.add />
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Edit -->
    <div class="modal" :class="{ 'active': $wire.modal.edit }">
        <a href="#close" wire:click="closeActiveModals" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" wire:click="closeActiveModals" class="btn btn-clear float-right" aria-label="Close"></a>
                <div class="modal-title h5">Ubah Data Pengguna</div>
            </div>
            <div class="modal-body">
                <div class="content">
                    <livewire:components.dashboard.user.edit />
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Delete -->
    <div class="modal" :class="{ 'active': $wire.modal.delete }">
        <a href="#close" wire:click="closeActiveModals" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" wire:click="closeActiveModals" class="btn btn-clear float-right" aria-label="Close"></a>
                <div class="modal-title h5">Hapus Pengguna</div>
            </div>
            <div class="modal-body">
                <div class="content">
                    <livewire:components.dashboard.user.delete />
                </div>
            </div>
        </div>
    </div>
    
    <div class="table-container">
        <table class="table table-striped table-hover">
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
                    <button class="btn btn-sm" wire:click="openModal('edit', {{ $user->id }})"><i class="icon icon-edit"></i></button>
                    <button class="btn btn-sm btn-error" wire:click="openModal('delete', {{ $user->id }})"><i class="icon icon-delete"></i></button>
                </td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

