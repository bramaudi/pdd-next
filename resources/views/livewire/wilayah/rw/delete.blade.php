<div class="p-1">
    <div wire:loading.class.remove="d-none" class="loading loading-lg d-center d-none"></div>
    <div wire:loading.remove>
        Anda akan menghapus RW "<strong>{{ $nomor }}</strong>" ?
    </div>
    <div class="pt-2 mt-2">
        <button class="btn bg-red-500" wire:click="submit">Hapus</button>
    </div>
</div>
