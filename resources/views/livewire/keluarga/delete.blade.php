<div class="p-1">
    <div wire:loading.class.remove="d-none" class="loading loading-lg d-center d-none"></div>
    <div wire:loading.remove>
        Anda akan menghapus data keluarga: <br>
        No KK: <strong>{{ $no_kk }}</strong> <br>
        Kepala Keluarga: {{ $nama_kepala }} ?
    </div>
    <div class="pt-2 mt-2">
        <button class="btn btn-error" wire:click="submit">Hapus</button>
    </div>
</div>
