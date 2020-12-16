<div class="card p-5">
@if(count($list))
    <div class="loading loading-lg loading-full" wire:loading></div>

    <div class="overflow-auto">
        <table class="w-full">
            <tr>
                <th>Aksi</th>
                <th>ID</th>
                <th>Foto</th>
                <th>Nomor KK</th>
                <th>Kepala Keluarga</th>
                <th>NIK</th>
                <th>Jumlah Anggota</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Dusun</th>
                <th>RT</th>
                <th>RW</th>
                <th>Tanggal Terdaftar</th>
                <th>Tanggal Cetak KK</th>
            </tr>
            @foreach($list as $keluarga)
                <tr>
                    <td>
                        <div class="flex">
                            <a
                                class="btn p-1 mr-1 bg-green-500"
                                data-tooltip="Ubah Data"
                                href="{{ route('keluarga.update', ['id' => $keluarga->id]) }}"
                            >
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
    
                            <button
                                class="btn p-1 bg-red-500"
                                data-tooltip="Hapus Keluarga"
                                @click="modal = 'delete'"
                                wire:click="$emit('loadData', {{ $keluarga->id }})"
                            >
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    </td>
                    <td>{{ $keluarga->id }}</td>
                    <td>{{ $keluarga->kepala() ? $keluarga->kepala()->foto_id : '--' }}</td>
                    <td>{{ $keluarga->no_kk }}</td>
                    <td>{{ $keluarga->kepala() ? $keluarga->kepala()->nama : '--' }}</td>
                    <td>{{ $keluarga->kepala() ? $keluarga->kepala()->nik : '--' }}</td>
                    <td>{{ $keluarga->anggota->count() }}</td>
                    <td>{{ $keluarga->kepala() ? $keluarga->kepala()->jenisKelamin->label : '--' }}</td>
                    <td>{{ $keluarga->kepala() ? $keluarga->kepala()->alamat : '--' }}</td>
                    <td>{{ $keluarga->kepala() ? $keluarga->kepala()->rt->rw->lingkungan->nama : '--' }}</td>
                    <td>{{ $keluarga->kepala() ? $keluarga->kepala()->rt->nomor : '--' }}</td>
                    <td>{{ $keluarga->kepala() ? $keluarga->kepala()->rt->rw->nomor : '--' }}</td>
                    <td>{{ $keluarga->created_at }}</td>
                    <td>{{ $keluarga->tanggal_cetak }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    {{ $list->links('livewire.pagination') }}

@else

    <div class="empty">
        <div class="empty-icon">
            <i class="icon icon-people"></i>
        </div>
        <p class="empty-title h5">Data Keluarga Kosong</p>
        <p class="empty-subtitle">Belum terdapat satupun data keluarga.</p>
        <div class="empty-action">
            <a class="btn btn-primary" href="{{ route('keluarga.create') }}">
                <i class="icon icon-plus mr-1"></i> Tambah Keluarga
            </a>
        </div>
    </div>

@endif
</div>
