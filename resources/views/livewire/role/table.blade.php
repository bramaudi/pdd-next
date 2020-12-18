<div class="card p-5">
    <div class="overflow-auto">
        <table class="w-full">
            <tr>
                <th>Aksi</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Terakhir diperbarui</th>
                <th>Dibuat</th>
            </tr>

            @foreach($systemRoles as $role)
                <tr>
                    <td>--</td>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->updated_at }}</td>
                    <td>{{ $role->created_at }}</td>
                </tr>
            @endforeach

            @foreach($roles as $role)
                <tr>
                    <td>
                        <div class="flex">
                            <button
                                class="btn p-1 mr-1 bg-green-500"
                                data-tooltip="Ganti Nama"
                                @click="modal = 'update'"
                                wire:click="$emit('loadData', {{ $role->id }})"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </button>
    
                            <a
                                class="btn p-1 mr-1 bg-blue-500"
                                data-tooltip="Ubah Hak Akses"
                                href="{{ route('permission.index', ['roleId' => $role->id ]) }}"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path></svg>
                            </a>
    
                            <button
                                class="btn p-1 bg-red-500"
                                data-tooltip="Hapus Jabatan"
                                @click="modal = 'delete'"
                                wire:click="$emit('loadData', {{ $role->id }})"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    </td>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->updated_at }}</td>
                    <td>{{ $role->created_at }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
