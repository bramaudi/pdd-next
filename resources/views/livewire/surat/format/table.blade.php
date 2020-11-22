<div>
    <div class="table-container">
        <table class="table table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Aksi</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Lampiran</th>
            </tr>

            @forelse($formats as $format)
                <tr>
                    <td>{{ $format->id }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning tooltip" data-tooltip="Ganti Nama" @click="modal = 'update'"
                            wire:click="$emit('loadData', {{ $format->id }})">
                            <i class="icon icon-edit"></i>
                        </button>

                        <a class="btn btn-sm btn-primary tooltip" data-tooltip="Ubah Hak Akses"
                            href="/dashboard/sistem/permission/{{ $format->id }}">
                            <i class="fas fa-lock"></i>
                        </a>

                        <button class="btn btn-sm btn-error tooltip" data-tooltip="Hapus Jabatan" @click="modal = 'delete'"
                            wire:click="$emit('loadData', {{ $format->id }})">
                            <i class="icon icon-delete"></i>
                        </button>
                    </td>
                    <td>{{ $format->prefix }}</td>
                    <td>{{ $format->name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Kosong...</td>
                </tr>
            @endforelse
        </table>
    </div>
</div>
