<form wire:submit.prevent="submit">

    @if($loading)
        <div class="loading loading-lg"></div>
    @else
        <div class="mb-3">
            <label class="block font-semibold">Dusun:</label>
            <input class="input" type="text" value="{{ $dusun }}" disabled>
        </div>

        <div class="mb-3">
            <label class="block font-semibold">RW:</label>
            <input class="input" type="text" value="{{ $rw }}" disabled>
        </div>

        <x-form-group model="nomor">
            Nomor RT:
        </x-form-group>

        @if($ketua_rt)
            <div class="mb-3">
                <label class="block font-semibold">Ketua RT Sebelumnya:</label>
                <input class="input" type="text" value="{{ $ketua_rt['nik'] }} - {{ $ketua_rt['nama'] }}" disabled>
            </div>
        @endif

        <div class="mb-3">
            <label for="inp-find-kepala" class="block font-semibold">
                Ketua RT <em>(NIK / Nama)</em>:
                
                @if($find && !$finded)
                <div wire:target="find" class="max-h-32 overflow-auto">
                    @foreach($list as $r)
                        <a tabindex="0" wire:click="$set('find', '{{ $r->nik }}')" class="input-search--item">
                            {{ $r->nik }} - {{ $r->nama }}
                        </a>
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

            @error('kepala_id') <div class="notif error">{{ $message }}</div> @enderror
        </div>

        <x-submit text="Simpan" />
    @endif

</form>
