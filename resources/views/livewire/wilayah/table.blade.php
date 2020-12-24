<div>
@if(count($list))
    <div class="loading loading-lg loading-full" wire:loading></div>

    <div class="overflow-auto">
        <table class="w-full">
            <tr>
                <th>Aksi</th>
                <th>ID</th>
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
                <td>
                    <div class="flex">
                        <a
                            href="{{ route('wilayah.rw', ['lingkungan_id' => $wilayah->id]) }}"
                            class="btn p-1 mr-1"
                            data-tooltip="Sub Wilayah Dusun"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                        </a>

                        <button
                            class="btn p-1 mr-1 bg-green-500"
                            data-tooltip="Ubah Data"
                            @click="modal = 'update'"
                            wire:click="$emit('loadData', {{ $wilayah->id }})"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </button>

                        <button
                            class="btn p-1 bg-red-500"
                            data-tooltip="Hapus Pengguna"
                            @click="modal = 'delete'"
                            wire:click="$emit('loadData', {{ $wilayah->id }})"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                </td>
                <td>{{ $wilayah->id }}</td>
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

@else

    <div class="p-5">
        <div class="text-2xl">Data Wilayah Kosong</div>
        <div class="my-5 mb-3">Belum terdapat satupun data wilayah.</div>
    </div>

@endif
</div>
