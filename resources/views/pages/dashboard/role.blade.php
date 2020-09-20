@section('title', 'Jabatan')

<div class="container py-2" x-data="{ modal: null }" @close-modals.window="modal = null">

    <button class="btn m-1" @click="modal = 'add'">
        <i class="icon icon-plus mr-1"></i> Buat Jabatan Baru
    </button>

    {{-- Modal Buat Jabatan Baru --}}

    <div :class="{ 'active': modal == 'add' }" class="modal">
        <a href="#close" @click="modal = null" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" @click="modal = null" class="btn btn-clear float-right" aria-label="Close"></a>
                <div class="modal-title h5">Buat Jabatan Baru</div>
            </div>
            <div class="modal-body">
                <div class="content">
                    <livewire:components.dashboard.role.create />
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Update Jabatan --}}

    <div :class="{ 'active': modal == 'update' }" class="modal">
        <a href="#close" @click="modal = null" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" @click="modal = null" class="btn btn-clear float-right" aria-label="Close"></a>
                <div class="modal-title h5">Update Jabatan</div>
            </div>
            <div class="modal-body">
                <div class="content">
                    <livewire:components.dashboard.role.update />
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Hapus Jabatan --}}

    <div :class="{ 'active': modal == 'delete' }" class="modal">
        <a href="#close" @click="modal = null" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" @click="modal = null" class="btn btn-clear float-right" aria-label="Close"></a>
                <div class="modal-title h5">Hapus Jabatan</div>
            </div>
            <div class="modal-body">
                <div class="content">
                    <livewire:components.dashboard.role.delete />
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}

    <div class="table-container">
        <table class="table table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Aksi</th>
                <th>Terakhir diperbarui</th>
                <th>Dibuat</th>
            </tr>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <button
                            class="btn btn-sm btn-warning tooltip"
                            data-tooltip="Ganti Nama"
                            @click="modal = 'update'"
                            wire:click="$emit('loadData', {{ $role->id }})"
                        >
                            <i class="icon icon-edit"></i>
                        </button>

                        <a
                            class="btn btn-sm btn-primary tooltip"
                            data-tooltip="Ubah Hak Akses"
                            href="/dashboard/permission/{{ $role->id }}"
                        >
                            <i class="fas fa-lock"></i>
                        </a>

                        <button
                            class="btn btn-sm btn-error tooltip"
                            data-tooltip="Hapus Jabatan"
                            @click="modal = 'delete'"
                            wire:click="$emit('loadData', {{ $role->id }})"
                        >
                            <i class="icon icon-delete"></i>
                        </button>
                    </td>
                    <td>{{ $role->updated_at }}</td>
                    <td>{{ $role->created_at }}</td>
                </tr>
                @endforeach
        </table>
    </div>
