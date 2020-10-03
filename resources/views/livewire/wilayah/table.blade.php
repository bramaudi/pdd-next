<div>
    <div class="loading loading-lg loading-full" wire:loading></div>

    <div class="table-container">
        <table class="table table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Aksi</th>
                <th>Dusun</th>
                <th>Kepala Dusun</th>
                <th>RW</th>
                <th>RT</th>
                <th>L + P</th>
                <th>L</th>
                <th>P</th>
            </tr>

            @foreach($list as $wilayah)
            <tr>
                <td>{{ $wilayah->id }}</td>
                <td>
                    <button
                        class="btn btn-sm tooltip"
                        data-tooltip="Ubah Data"
                        @click="modal = 'update'"
                        wire:click="$emit('loadData', {{ $wilayah->id }})"
                    >
                        <i class="icon icon-edit"></i>
                    </button>

                    <button
                        class="btn btn-sm btn-error tooltip"
                        data-tooltip="Hapus Pengguna"
                        @click="modal = 'delete'"
                        wire:click="$emit('loadData', {{ $wilayah->id }})"
                    >
                        <i class="icon icon-delete"></i>
                    </button>
                </td>
                <td>{{ $wilayah->nama }}</td>
                <td>{{ $wilayah->kepala->nama ?? '--' }}</td>
                <td>{{ count($wilayah->rw) }}</td>
                <td>{{ count($wilayah->rt) }}</td>
                <td>{{ count($wilayah->penduduk) }}</td>
                <td>{{ count($wilayah->penduduk->where('jenis_kelamin_id', $pria_id)) }}</td>
                <td>{{ count($wilayah->penduduk->where('jenis_kelamin_id', $wanita_id)) }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    {{ $list->links('livewire.pagination') }}
</div>
