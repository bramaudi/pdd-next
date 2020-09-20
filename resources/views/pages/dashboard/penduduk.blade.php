<div class="container py-2" x-data="{ modal: null }" @close-modals.window="modal = null">
    
    <button class="btn m-1" @click="modal = 'add'">
        <i class="icon icon-plus mr-1"></i> Tambah Penduduk
    </button>

    {{-- Modal Add --}}
    
    <div :class="{ 'active': modal == 'add' }" class="modal">
        <a href="#close" @click="modal = null" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" @click="modal = null" class="btn btn-clear float-right" aria-label="Close"></a>
                <div class="modal-title h5">Tambah Penduduk</div>
            </div>
            <div class="modal-body">
                <div class="content">
                    <!-- <livewire:components.dashboard.user.create /> -->
                </div>
            </div>
        </div>
    </div>
    
    {{-- Modal Edit --}}

    <div :class="{ 'active': modal == 'edit' }" class="modal">
        <a href="#close" @click="modal = null" wire:click="$emit('resetLoaded')" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" @click="modal = null" wire:click="$emit('resetLoaded')" class="btn btn-clear float-right" aria-label="Close"></a>
                <div class="modal-title h5">Ubah Data Penduduk</div>
            </div>
            <div class="modal-body">
                <div class="content">
                    <!-- <livewire:components.dashboard.user.update /> -->
                </div>
            </div>
        </div>
    </div>
    
    {{-- Modal Delete --}}

    <div :class="{ 'active': modal == 'del' }" class="modal">
        <a href="#close" @click="modal = null" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" @click="modal = null" class="btn btn-clear float-right" aria-label="Close"></a>
                <div class="modal-title h5">Hapus Penduduk</div>
            </div>
            <div class="modal-body">
                <div class="content">
                    <!-- <livewire:components.dashboard.user.delete /> -->
                </div>
            </div>
        </div>
    </div>
    
    {{-- Table --}}
    
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
    
            @foreach($listPenduduk as $penduduk)
            <tr>
                <td>{{ $penduduk->id }}</td>
                <td>
                    <button
                        class="btn btn-sm tooltip"
                        data-tooltip="Ubah Data"
                        @click="modal = 'edit'"
                        wire:click="$emit('loadData', {{ $penduduk->id }})"
                    >
                        <i class="icon icon-edit"></i>
                    </button>

                    <button
                        class="btn btn-sm btn-error tooltip"
                        data-tooltip="Hapus Pengguna"
                        @click="modal = 'del'"
                        wire:click="$emit('loadData', {{ $penduduk->id }})"
                    >
                        <i class="icon icon-delete"></i>
                    </button>
                </td>
                <td>{{ $penduduk->foto_id }}</td>
                <td>{{ $penduduk->nik }}</td>
                <td>{{ $penduduk->nama }}</td>
                <td>no-kk?</td>
                <td>nama-ayah?</td>
                <td>nama-ibu?</td>
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

    {{ $listPenduduk->links('components.pagination') }}
</div>
