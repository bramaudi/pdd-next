<div>
    <div class="loading loading-lg loading-full" wire:loading></div>

    <div class="table-container">
        <table class="table table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Aksi</th>
                <th>Nomor</th>
                <th>Ketua RW</th>
                <th>RT</th>
                <th>L + P</th>
                <th>L</th>
                <th>P</th>
            </tr>

            @foreach($list as $rw)
            <tr>
                <td>{{ $rw->id }}</td>
                <td>
                    <a
                        href="{{ route('wilayah.rt', ['rw_id' => $rw->id]) }}"
                        class="btn btn-primary btn-sm tooltip"
                        data-tooltip="Sub Wilayah RW"
                    >
                        <i class="fas fa-list"></i>
                    </a>

                    <button
                        class="btn btn-sm tooltip"
                        data-tooltip="Ubah Data"
                        @click="modal = 'update'"
                        wire:click="$emit('loadData', {{ $rw->id }})"
                    >
                        <i class="icon icon-edit"></i>
                    </button>

                    <button
                        class="btn btn-sm btn-error tooltip"
                        data-tooltip="Hapus Pengguna"
                        @click="modal = 'delete'"
                        wire:click="$emit('loadData', {{ $rw->id }})"
                    >
                        <i class="icon icon-delete"></i>
                    </button>
                </td>
                <td>{{ $rw->nomor }}</td>
                <td>ketua-rw?</td>
                <td>{{ count($rw->rt) }}</td>
                <td>{{ count($rw->penduduk) }}</td>
                <td>{{ count($rw->penduduk->where('jenis_kelamin_id', $pria_id)) }}</td>
                <td>{{ count($rw->penduduk->where('jenis_kelamin_id', $wanita_id)) }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    {{ $list->links('livewire.pagination') }}
</div>
