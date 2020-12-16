<form wire:submit.prevent="submit" class="card form">

    <div class="section">Identitas Desa</div>

    <input type="hidden" wire:model="id_desa">

    {{-- Nama --}}
    <x-form-group model="nama">
        Nama Desa:
    </x-form-group>

    {{-- Email --}}
    <x-form-group model="email">
        Email Desa:
    </x-form-group>

    {{-- Telepon --}}
    <x-form-group model="telepon">
        Nomor Telp. Desa:
    </x-form-group>

    {{-- Website --}}
    <x-form-group model="website">
        Website Desa:
    </x-form-group>

    {{-- Tentang --}}
    <div class="mb-3">
        <label class="block" for="inp-config-tentang">Tentang:</label>
        <textarea wire:model="tentang" rows="5" id="inp-config-tentang" class="input w-full"></textarea>
    </div>

    <div class="mt-5 section">Identitas Pemerintah</div>

    {{-- Kepala Desa --}}
    <x-form-group model="kades_nama">
        Nama Kepala Desa:
    </x-form-group>
    <x-form-group model="kades_nip">
        NIP Kepala Desa:
    </x-form-group>

    {{-- Camat --}}
    <x-form-group model="camat_nama">
        Nama Camat:
    </x-form-group>
    <x-form-group model="camat_nip">
        NIP Camat:
    </x-form-group>

    <div class="mt-5 section">Alamat Desa</div>

    {{-- Provinsi --}}
    <x-form-group-select model="province_id" :selected="$selected['province']" :options="$options['provinces']">
        Provinsi:
    </x-form-group-select>

    {{-- Kabupaten --}}
    <x-form-group-select model="regency_id" :selected="$selected['regency']" :options="$options['regencies']">
        Kabupaten:
    </x-form-group-select>

    {{-- Kecamatan --}}
    <x-form-group-select model="district_id" :selected="$selected['district']" :options="$options['districts']">
        Kecamatan:
    </x-form-group-select>

    {{-- Kelurahan --}}
    <x-form-group-select model="village_id" :selected="$selected['village']" :options="$options['villages']">
        Kelurahan:
    </x-form-group-select>
    
    <x-submit text="Simpan" />

</form>
