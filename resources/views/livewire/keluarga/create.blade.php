<form wire:submit.prevent="submit" class="side-control">

    <blockquote class="text-tiny">
        <span class="text-error mr-2">*</span> Wajib diisi, tidak boleh kosong. <br>
        <span class="text-error mr-2">?</span> Wajib jika tersedia.
    </blockquote>

    @error('rt_id')
        <div class="toast toast-error">
            Mohon pilih dusun -> RW -> RT terlebih dahulu.
        </div>
    @enderror

    <div class="columns">
        <div class="column col-4 col-sm-12">
            <label class="form-label" for="input-penduduk.dusun">
                Dusun <span class="text-error">*</span>:
            </label>
            <select wire:change="$set('lingkungan_id', $event.target.value)" class="form-select" id="input-penduduk.dusun">
                <option value="">--</option>
                @foreach($option['lingkungan'] as $r)
                    <option value="{{ $r->id }}">{{ $r->nama }}</option>
                @endforeach
            </select>
        </div>

        @if($lingkungan_id)
        <div class="column col-4 col-sm-12">
            <label class="form-label" for="input-penduduk.rw">
                RW <span class="text-error">*</span>:
            </label>
            <select wire:change="$set('rw_id', $event.target.value)" class="form-select" id="input-penduduk.rw">
                <option value="">--</option>
                @foreach($option['rw'] as $r)
                    <option value="{{ $r->id }}">{{ $r->nomor }}</option>
                @endforeach
            </select>
        </div>
        @endif

        @if($rw_id)
        <div class="column col-4 col-sm-12">
            <label class="form-label" for="input-penduduk.rt">
                RT <span class="text-error">*</span>:
            </label>
            <select wire:change="$set('rt_id', $event.target.value)" class="form-select" id="input-penduduk.rt">
                <option value="">--</option>
                @foreach($option['rt'] as $r)
                    <option value="{{ $r->id }}">{{ $r->nomor }}</option>
                @endforeach
            </select>
        </div>
        @endif

    </div>

    <br>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group model="no_kk">
                Nomor KK <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="tanggal_cetak" type="date">
                Tanggal Cetak:
            </x-form-group>
        </div>
    </div>

    <div class="form-group @error('kepala_id') has-error @enderror">
        <label for="inp-find-kepala" class="form-label">
            Kepala Keluarga <em>(NIK / Nama)</em> <span class="text-error">*</span>:
            
            @if($find && !$finded)
            <ul wire:target="find" class="menu mb-2" style="max-height: 150px; overflow: auto">
                @foreach($list as $r)
                <li class="menu-item">
                    <a tabindex="0" title="No KK: {{ $r->keluarga ? $r->keluarga->no_kk : '???' }}, Status: {{ $r->hubunganKeluarga->label }}" wire:click="$set('find', '{{ $r->nik }}')">
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

    <br>
    <x-submit text="Simpan" />

</form>