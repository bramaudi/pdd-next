<div>
@if(count($list))
<a class="btn m-1" href="{{ route('penduduk.create') }}">
    <i class="icon icon-plus mr-1"></i> Tambah Penduduk
</a>

<div class="loading loading-lg loading-full" wire:loading></div>

    <div class="table-container">
        <table class="table table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Aksi</th>
                <th>Foto</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>No. KK</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>No. Rumah Tangga</th>
                <th>Alamat</th>
                <th>Dusun</th>
                <th>RT</th>
                <th>RW</th>
                <th>Pendidikan Dalam KK</th>
                <th>Umur</th>
                <th>Pekerjaan</th>
                <th>Kawin</th>
            </tr>

            @foreach($list as $penduduk)
            <tr>
                <td>{{ $penduduk->id }}</td>
                <td>
                    <a
                        class="btn btn-sm tooltip"
                        data-tooltip="Ubah Data"
                        href="{{ route('penduduk.update', ['id' => $penduduk->id]) }}"
                    >
                        <i class="icon icon-edit"></i>
                    </a>

                    <button
                        class="btn btn-sm btn-error tooltip"
                        data-tooltip="Hapus Pengguna"
                        @click="modal = 'delete'"
                        wire:click="$emit('loadData', {{ $penduduk->id }})"
                    >
                        <i class="icon icon-delete"></i>
                    </button>
                </td>
                <td>{{ $penduduk->foto_id }}</td>
                <td>{{ $penduduk->nik }}</td>
                <td>{{ $penduduk->nama }}</td>
                <td>{{ $penduduk->keluarga->no_kk ?? '--' }}</td>
                <td>{{ $penduduk->nama_ayah }}</td>
                <td>{{ $penduduk->nama_ibu }}</td>
                <td>no-rumah-tangga?</td>
                <td>{{ $penduduk->alamat }}</td>
                <td>{{ $penduduk->tempat_lahir }}</td>
                <td>{{ $penduduk->rt->nomor }}</td>
                <td>{{ $penduduk->rt->rw->nomor }}</td>
                <td>{{ $penduduk->pendidikan->label }}</td>
                <td>{{ $penduduk->umur }}</td>
                <td>{{ $penduduk->pekerjaan->label }}</td>
                <td>{{ $penduduk->statusPerkawinan->label }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    {{ $list->links('livewire.pagination') }}
</div>

@else

    <div class="empty">
        <div class="empty-icon">
            <i class="icon icon-people"></i>
        </div>
        <p class="empty-title h5">Data Penduduk Kosong</p>
        <p class="empty-subtitle">Belum terdapat satupun data penduduk.</p>
        <div class="empty-action">
            <a class="btn btn-primary" href="{{ route('penduduk.create') }}">
                <i class="icon icon-plus mr-1"></i> Tambah Penduduk
            </a>
        </div>
    </div>

@endif
</div>