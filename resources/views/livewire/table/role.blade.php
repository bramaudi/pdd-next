<div>
    <div class="table-container">
        <table class="table table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Aksi</th>
                <th>Terakhir diperbarui</th>
                <th>Dibuat</th>
            </tr>
            @foreach($systemRoles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>--</td>
                    <td>{{ $role->updated_at }}</td>
                    <td>{{ $role->created_at }}</td>
                </tr>
            @endforeach

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
                            href="/dashboard/sistem/permission/{{ $role->id }}"
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
</div>
