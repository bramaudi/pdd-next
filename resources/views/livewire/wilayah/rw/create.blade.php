<form wire:submit.prevent="submit">
    <div class="mb=3">
        <label class="block font-semibold">Dusun:</label>
        <input class="input" type="text" value="{{ $dusun }}" disabled>
    </div>

    <x-form-group model="nomor">
        Nomor RW:
    </x-form-group>

    <div class="mb-3">
        <label for="inp-find-kepala" class="block font-semibold">
            Ketua RW <em>(NIK / Nama)</em>:
            
            @if($find && !$finded)
            <div wire:target="find" class="max-h-32 overflow-auto">
                @foreach($list as $r)
                    <span tabindex="0" wire:click="$set('find', '{{ $r->nik }}')" class="input-search--item">
                        {{ $r->nik }} - {{ $r->nama }}
                    </span>
                @endforeach
                @if(!count($list))
                <span class="input-search--item error">Tidak ditemukan</span>
                @endif
            </div>
            @endif

        </label>

        @if($finded)
            <div class="relative">
                <input type="text" wire:model="find" class="input pr-10">
                <svg class="w-6 h-6 absolute top-0 right-0 mt-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
            </div>
        @else
            <input type="text" wire:model="find" class="input">
        @endif

        @error('kepala_id') <div class="notif--error">{{ $message }}</div> @enderror
    </div>

    <x-submit text="Buat" />
</form>
