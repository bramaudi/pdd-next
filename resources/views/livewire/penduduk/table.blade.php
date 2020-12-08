<div class="card p-5">
    
@if(count($list))

    <a class="btn mb-3 inline-flex" href="{{ route('penduduk.create') }}">
        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        Tambah Penduduk
    </a>

    <div class="loading loading-lg loading-full" wire:loading></div>

        <div class="overflow-auto">
            <table class="w-full">
                <tr>
                    <th>Aksi</th>
                    <th>ID</th>
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
                    <td>
                        <div class="flex">
                            <a
                                class="btn p-1 mr-1 bg-green-500"
                                data-tooltip="Ubah Data"
                                href="{{ route('penduduk.update', ['id' => $penduduk->id]) }}"
                            >
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
    
                            <button
                                class="btn p-1 bg-red-500"
                                data-tooltip="Hapus Pengguna"
                                @click="modal = 'delete'"
                                wire:click="$emit('loadData', {{ $penduduk->id }})"
                            >
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    </td>
                    <td>{{ $penduduk->id }}</td>
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

        @if($list->hasPages())
            {{ $list->links('livewire.pagination') }}
        @endif
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