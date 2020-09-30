<form wire:submit.prevent="submit" class="side-control">

    <blockquote class="text-tiny">
        <span class="text-error">*</span> Wajib diisi, tidak boleh kosong.
    </blockquote>

    @error('rt_id')
        <div class="toast toast-error">
            Mohon pilih dusun -> RW -> RT terlebih dahulu.
        </div>
    @enderror

    <div class="columns">
        <div class="column col-4 col-sm-12">
            <label class="form-label" for="input-input.dusun">
                Dusun <span class="text-error">*</span>:
            </label>
            <select wire:change="$set('lingkungan_id', $event.target.value)" class="form-select" id="input-input.dusun">
                <option value="">--</option>
                @foreach($option['lingkungan'] as $r)
                    <option value="{{ $r->id }}">{{ $r->nama }}</option>
                @endforeach
            </select>
        </div>

        @if($lingkungan_id)
        <div class="column col-4 col-sm-12">
            <label class="form-label" for="input-input.rw">
                RW <span class="text-error">*</span>:
            </label>
            <select wire:change="$set('rw_id', $event.target.value)" class="form-select" id="input-input.rw">
                <option value="">--</option>
                @foreach($option['rw'] as $r)
                    <option value="{{ $r->id }}">{{ $r->nomor }}</option>
                @endforeach
            </select>
        </div>
        @endif

        @if($rw_id)
        <div class="column col-4 col-sm-12">
            <label class="form-label" for="input-input.rt">
                RT <span class="text-error">*</span>:
            </label>
            <select wire:change="$set('input.rt_id', $event.target.value)" class="form-select" id="input-input.rt">
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
            <x-form-group model="input.nik">
                NIK <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.nama">
                Nama Lengkap <span class="text-error">*</span>:
            </x-form-group>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Status Kepemilikan KTP</div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="input.ktp_el_id" :options="$option['ktp_el']">
                KTP Elektronik <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="input.status_rekam_id" :options="$option['status_rekam']">
                Status Rekam <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <br>

    <div class="columns">
        <div class="column col-4 col-sm-12">
            <x-form-group model="input.no_kk_sebelumnya" type="number">
                Nomor KK Sebelumnya:
            </x-form-group>
        </div>
        <div class="column col-4 col-sm-12">
            <x-form-group-select model="input.hubungan_keluarga_id" :options="$option['hubungan_keluarga']">
                Hubungan Dalam Keluarga <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="column col-4 col-sm-12">
            <x-form-group-select model="input.jenis_kelamin_id" :options="$option['jenis_kelamin']">
                Jenis Kelamin <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="input.agama_id" :options="$option['agama']">
                Agama <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="input.status_kependudukan_id" :options="$option['status_kependudukan']">
                Status Kependudukan <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Data Kelahiran</div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.akta_lahir">
                Nomor Akta Kelahiran <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.tempat_lahir">
                Tempat Lahir <span class="text-error">*</span>:
            </x-form-group>
        </div>
    </div>

    <div class="columns">
        <div class="column col-4 col-sm-12">
            <x-form-group type="date" model="input.tanggal_lahir">
                Tanggal Lahir <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="column col-4 col-sm-12">
            <x-form-group type="time" model="input.waktu_lahir">
                Waktu Lahir <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="column col-4 col-sm-12">
            <x-form-group-select model="input.tempat_dilahirkan_id" :options="$option['tempat_dilahirkan']">
                Tempat Dilahirkan <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <div class="columns">
        <div class="column col-4 col-sm-12">
            <x-form-group-select model="input.jenis_kelahiran_id" :options="$option['jenis_kelahiran']">
                Jenis Kelahiran <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="column col-4 col-sm-12">
            <x-form-group model="input.kelahiran_anak_ke" type="number">
                Kelahiran Anak Ke <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="column col-4 col-sm-12">
            <x-form-group-select model="input.penolong_kelahiran_id" :options="$option['penolong_kelahiran']">
                Penolong Kelahiran <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.berat_lahir" type="number">
                Berat Lahir (<span class="text-error">kg</span>) <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.panjang_lahir" type="number">
                Panjang Lahir (<span class="text-error">cm</span>) <span class="text-error">*</span>:
            </x-form-group>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Pendidikan & Pekerjaan</div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="input.pendidikan_id" :options="$option['pendidikan']">
                Pendidikan <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="input.pekerjaan_id" :options="$option['pekerjaan']">
                Pekerjaan <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Data Kewarganegaraan</div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="input.kewarganegaraan_id" :options="$option['kewarganegaraan']">
                Kewarganegaraan <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.dokumen_paspor" type="number">
                Nomor Paspor:
            </x-form-group>
        </div>
    </div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.tanggal_akhir_paspor" type="date">
                Tanggal paspor berakhir:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.dokumen_kitas" type="number">
                Nomor KITAS/KITAP:
            </x-form-group>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Data Orang Tua</div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.nik_ayah">
                NIK Ayah <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.nama_ayah">
                Nama Ayah <span class="text-error">*</span>:
            </x-form-group>
        </div>
    </div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.nik_ibu">
                NIK Ibu <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.nama_ibu">
                Nama Ibu <span class="text-error">*</span>:
            </x-form-group>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Alamat</div>

    <x-form-group model="input.ponsel">
        Telepon <span class="text-error">*</span>:
    </x-form-group>
    <x-form-group model="input.alamat_sebelumnya">
        Alamat Sebelumnya:
    </x-form-group>
    <x-form-group model="input.alamat">
        Alamat Sekarang <span class="text-error">*</span>:
    </x-form-group>

    <br>
    <div class="form-subtitle">Status Perkawinan</div>

    <div class="columns">
        <div class="column col-4 col-sm-12">
            <x-form-group-select model="input.status_perkawinan_id" :options="$option['status_perkawinan']">
                Status Perkawinan <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="column col-4 col-sm-12">
            <x-form-group model="input.akta_kawin">
                No. Akta / Buku Nikah:
            </x-form-group>
        </div>
        <div class="column col-4 col-sm-12">
            <x-form-group model="input.tanggal_kawin" type="date">
                Tanggal Perkawinan:
            </x-form-group>
        </div>
    </div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.akta_cerai">
                Akta Perceraian:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.tanggal_cerai" type="date">
                Tanggal Perceraian:
            </x-form-group>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Data Kesehatan</div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="input.golongan_darah_id" :options="$option['golongan_darah']">
                Golongan Darah <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="input.cacat_id" :options="$option['cacat']">
                Cacat <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="input.sakit_menahun_id" :options="$option['sakit_menahun']">
                Sakit Menahun <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="input.cara_kb_id" :options="$option['cara_kb']">
                Akseptor KB:
            </x-form-group-select>
        </div>
    </div>

    <br>
    <x-submit text="Simpan" />

</form>