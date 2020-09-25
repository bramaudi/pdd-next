<div>
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
                    <td>--</td>
                    <td>{{ $keluarga->kepala()->foto_id }}</td>
                    <td>{{ $keluarga->no_kk }}</td>
                    <td>{{ $keluarga->kepala()->nama }}</td>
                    <td>{{ $keluarga->kepala()->nik }}</td>
                    <td>{{ $keluarga->anggota->count() }}</td>
                    <td>{{ $keluarga->kepala()->jenisKelamin->label }}</td>
                    <td>{{ $keluarga->kepala()->alamat }}</td>
                    <td>{{ $keluarga->kepala()->rt->rw->lingkungan->nama }}</td>
                    <td>{{ $keluarga->kepala()->rt->nomor }}</td>
                    <td>{{ $keluarga->kepala()->rt->rw->nomor }}</td>
                    <td>{{ $keluarga->created_at }}</td>
                    <td>{{ $keluarga->tanggal_cetak }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    {{ $list->links('livewire.pagination') }}
</div>
