<div class="p-1">
    <div wire:loading.class.remove="d-none" class="loading loading-lg d-center d-none"></div>
    <div wire:loading.remove>
        Anda akan menghapus pengguna "<strong>{{ $name }}</strong>" ?
        <br>
        <br>
        <button class="btn btn-error" wire:click="submit">Hapus</button>
    </div>
</div>
