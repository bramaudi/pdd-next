<form wire:submit.prevent="submit" class="card form">

    <blockquote>
        <span class="text-error mr-2">*</span> Wajib diisi, tidak boleh kosong. <br>
        <span class="text-error mr-2">?</span> Wajib jika tersedia.
    </blockquote>

    <br>

    @error('rt_id')
        <div class="my-3 notif--error">
            Mohon pilih dusun -> RW -> RT terlebih dahulu.
        </div>
    @enderror

    <div class="flex mb-3 items-center">
        <div class="flex-auto mr-3">
            <x-form-group-select model="lingkungan_id" :selected="@$selected['lingkungan']" :options="$option['lingkungan']">
                Dusun <span class="text-error">*</span>:
            </x-form-group-select>
        </div>

        @if($lingkungan_id)
        <div class="mr-3">
            <x-form-group-select model="rw_id" :selected="@$selected['rw']" :options="$option['rw'] ?? []">
                RW <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        @endif

        @if($rw_id)
        <div>
            <x-form-group-select model="penduduk.rt_id" :selected="@$selected['rt']" :options="$option['rt'] ?? []">
                RT <span class="text-error">*</span>:
            </x-form-group-select>
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

    <div class="mb-3">
        <label for="inp-find-kepala" class="block font-semibold">
            Kepala Keluarga <em>(NIK / Nama)</em> <span class="text-error">*</span>: <br>
        </label>
        <small>Terpilih: {{ $currentKepala->nik }} - {{ $currentKepala->nama }}</small>

        @if($searchKepala && !$findedKepala)
        <ul wire:target="searchKepala" class="max-h-32 overflow-auto">
            @foreach($listKepala as $r)
            <span wire:click="$set('searchKepala', '{{ $r->nik }}')" class="input-search--item">
                {{ $r->nik }} - {{ $r->nama }}
            </span>
            @endforeach
            @if(!count($listKepala))
            <span class="input-search--item error">Tidak ditemukan</span>
            @endif
        </ul>
        @endif

        @if($findedKepala)
            <div class="relative">
                <input type="text" wire:model="searchKepala" class="input w-full pr-10">
                <svg class="w-6 h-6 absolute top-0 right-0 mt-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
            </div>
        @else
            <input type="text" wire:model="searchKepala" class="input w-full">
        @endif

        @error('kepala_id') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>

    <div class="section">Anggota Keluarga</div>

    <div class="mb-3">
        <label for="inp-find-kepala" class="block font-semibold">
            Tambah Keluarga <em>(NIK / Nama)</em>:
        </label>
            
        @if($searchAnggota && !$findedAnggota)
        <ul wire:target="searchAnggota" class="max-h-32 overflow-auto">
            @foreach($listAnggota as $r)
            <span wire:click="addAnggota({{ $r->id }})" class="input-search--item">
                {{ $r->nik }} - {{ $r->nama }}
            </span>
            @endforeach
            @if(!count($listAnggota))
            <span class="input-search--item">Tidak ditemukan</span>
            @endif
        </ul>
        @endif

        <input type="text" wire:model="searchAnggota" class="input w-full">

        @error('anggota_id') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>

    @foreach($anggota as $penduduk)
        <li title="NIK: {{ $penduduk->nik }}">
            {{ $penduduk->nama }} (<code>{{ $penduduk->hubunganKeluarga->label }}</code>)
            <button type="button" wire:click="removeAnggota({{ $penduduk->id }})" class="btn p-1 ml-1 bg-red-500">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            </button>
        </li>
    @endforeach

    <br>
    <x-submit text="Simpan" />

</form>