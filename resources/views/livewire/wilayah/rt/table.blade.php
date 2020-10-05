<div>
    <div class="loading loading-lg loading-full" wire:loading></div>

    <div class="table-container">
        <table class="table table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Aksi</th>
                <th>Nomor</th>
                <th>Ketua RT</th>
                <th>L + P</th>
                <th>L</th>
                <th>P</th>
            </tr>

            @foreach($list as $rt)
            <tr>
                <td>{{ $rt->id }}</td>
                <td>
                    <button
                        class="btn btn-sm tooltip"
                        data-tooltip="Ubah Data"
                        @click="modal = 'update'"
                        wire:click="$emit('loadData', {{ $rt->id }})"
                    >
                        <i class="icon icon-edit"></i>
                    </button>

                    <button
                        class="btn btn-sm btn-error tooltip"
                        data-tooltip="Hapus Pengguna"
                        @click="modal = 'delete'"
                        wire:click="$emit('loadData', {{ $rt->id }})"
                    >
                        <i class="icon icon-delete"></i>
                    </button>
                </td>
                <td>{{ $rt->nomor }}</td>
                <td>{{ $rt->kepala->nama ?? '--' }}</td>
                <td>{{ count($rt->penduduk) }}</td>
                <td>{{ count($rt->penduduk->where('jenis_kelamin_id', $pria_id)) }}</td>
                <td>{{ count($rt->penduduk->where('jenis_kelamin_id', $wanita_id)) }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    {{ $list->links('livewire.pagination') }}
</div>
