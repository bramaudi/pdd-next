<div>
@if(count($list))

    <a class="btn mr-1" href="{{ route('keluarga.create') }}">
        <i class="icon icon-plus mr-2"></i> Tambah KK Baru
    </a>

    <div class="loading loading-lg loading-full" wire:loading></div>

    <div class="table-container">
        <table class="table table-striped table-hover">
            <tr>
                <td>ID</td>
                <td>Aksi</td>
                <td>Foto</td>
                <td>Nomor KK</td>
                <td>Kepala Keluarga</td>
                <td>NIK</td>
                <td>Jumlah Anggota</td>
                <td>Jenis Kelamin</td>
                <td>Alamat</td>
                <td>Dusun</td>
                <td>RT</td>
                <td>RW</td>
                <td>Tanggal Terdaftar</td>
                <td>Tanggal Cetak KK</td>
            </tr>
            @foreach($list as $keluarga)
                <tr>
                    <td>{{ $keluarga->id }}</td>
                    <td>
                        <a
                            class="btn btn-sm tooltip"
                            data-tooltip="Ubah Data"
                            href="{{ route('keluarga.update', ['id' => $keluarga->id]) }}"
                        >
                            <i class="icon icon-edit"></i>
                        </a>

                        <button
                            class="btn btn-sm btn-error tooltip"
                            data-tooltip="Hapus Keluarga"
                            @click="modal = 'delete'"
                            wire:click="$emit('loadData', {{ $keluarga->id }})"
                        >
                            <i class="icon icon-delete"></i>
                        </button>
                    </td>
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
