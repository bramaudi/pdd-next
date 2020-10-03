<form wire:submit.prevent="submit" class="pb-2">

    @if($loading)

        <div class="loading loading-lg"></div>

    @else

        <x-form-group model="nama">
            Nama Dusun <span class="text-error">*</span>:
        </x-form-group>

        @if($kepala_dusun)
            <div class="form-group">
                <label class="form-label">Kepala Dusun Sebelumnya:</label>
                <input class="form-input" type="text" value="{{ $kepala_dusun['nik'] }} - {{ $kepala_dusun['nama'] }}" disabled>
            </div>
        @endif

        <div class="form-group @error('kepala_id') has-error @enderror">
            <label for="inp-find-kepala" class="form-label">
                Kepala Dusun <em>(NIK / Nama)</em>:
                
                @if($find && !$finded)
                <ul wire:target="find" class="menu mb-2" style="max-height: 150px; overflow: auto">
                    @foreach($list as $r)
                    <li class="menu-item">
                        <a tabindex="0" wire:click="$set('find', '{{ $r->nik }}')">
                            {{ $r->nik }} - {{ $r->nama }}
                        </a>
                    </li>
                    @endforeach
                    @if(!count($list))
                    <li class="menu-item">Tidak ditemukan</li>
                    @endif
                </ul>
                @endif

            </label>

            @if($finded)
                <div class="has-icon-right">
                    <input type="text" wire:model="find" class="form-input">
                    <i class="form-icon icon icon-check"></i>
                </div>
            @else
                <input type="text" wire:model="find" class="form-input">
            @endif

            @error('kepala_id') <div class="form-input-hint">{{ $message }}</div> @enderror
        </div>
            

        <x-submit text="Simpan" />

    @endif

</form>
