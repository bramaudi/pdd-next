<div>
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

            @foreach($list as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>
                @if(!$user->hasRole('Super Admin'))
                    <button
                        class="btn btn-sm tooltip"
                        data-tooltip="Ubah Data"
                        @click="modal = 'update'"
                        wire:click="$emit('loadData', {{ $user->id }})"
                    >
                        <i class="icon icon-edit"></i>
                    </button>

                    <button
                        class="btn btn-sm btn-error tooltip"
                        data-tooltip="Hapus Pengguna"
                        @click="modal = 'delete'"
                        wire:click="$emit('loadData', {{ $user->id }})"
                    >
                        <i class="icon icon-delete"></i>
                    </button>
                @else -- @endif
                </td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    {{ $list->links('livewire.pagination') }}
</div>
