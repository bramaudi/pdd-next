<div>
    <div class="table-container">
        <table class="table table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Aksi</th>
                <th>Template</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Lampiran</th>
            </tr>

            @forelse($formats as $format)
                <livewire:surat.format.row :data="$format" />
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada format surat, Kosong...</td>
                </tr>
            @endforelse
        </table>
    </div>
</div>
