<div class="container py-2" x-data="{ modal: null }" @close-modals.window="modal = null">
    
    <button class="btn m-1" @click="modal = 'add'">
        <i class="icon icon-plus mr-1"></i> Tambah Pengguna Baru
    </button>

    {{-- Modal Add --}}
    
    <div x-show="modal == 'add'" class="modal active">
        <a href="#close" @click="modal = null" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" @click="modal = null" class="btn btn-clear float-right" aria-label="Close"></a>
                <div class="modal-title h5">Tambah Pengguna Baru</div>
            </div>
            <div class="modal-body">
                <div class="content">
                    <livewire:components.dashboard.user.create />
                </div>
            </div>
        </div>
    </div>
    
    {{-- Modal Edit --}}

    <div x-show="modal == 'edit'" class="modal active">
        <a href="#close" @click="modal = null" wire:click="$emit('resetLoaded')" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" @click="modal = null" wire:click="$emit('resetLoaded')" class="btn btn-clear float-right" aria-label="Close"></a>
                <div class="modal-title h5">Ubah Data Pengguna</div>
            </div>
            <div class="modal-body">
                <div class="content">
                    <livewire:components.dashboard.user.update />
                </div>
            </div>
        </div>
    </div>
    
    {{-- Modal Delete --}}

    <div x-show="modal == 'del'" class="modal active">
        <a href="#close" @click="modal = null" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" @click="modal = null" class="btn btn-clear float-right" aria-label="Close"></a>
                <div class="modal-title h5">Hapus Pengguna</div>
            </div>
            <div class="modal-body">
                <div class="content">
                    <livewire:components.dashboard.user.delete />
                </div>
            </div>
        </div>
    </div>
    
    {{-- Table --}}
    
    <div class="loading loading-lg loading-full" wire:loading></div>
    
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
                    <button class="btn btn-sm" @click="modal = 'edit'" wire:click="$emit('loadData', {{ $user->id }})"><i class="icon icon-edit"></i></button>
                    <button class="btn btn-sm btn-error" @click="modal = 'del'" wire:click="$emit('loadData', {{ $user->id }})"><i class="icon icon-delete"></i></button>
                </td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    {{ $users->links('components.pagination') }}
</div>
