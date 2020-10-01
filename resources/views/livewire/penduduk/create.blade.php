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
            <select wire:change="$set('penduduk.rt_id', $event.target.value)" class="form-select" id="input-penduduk.rt">
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
            <x-form-group model="penduduk.nik">
                NIK <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="penduduk.nama">
                Nama Lengkap <span class="text-error">*</span>:
            </x-form-group>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Status Kepemilikan KTP</div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="penduduk.ktp_el_id" :options="$option['ktp_el']">
                KTP Elektronik <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="penduduk.status_rekam_id" :options="$option['status_rekam']">
                Status Rekam <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <br>

    <div class="columns">
        <div class="column col-4 col-sm-12">
            <x-form-group model="penduduk.no_kk_sebelumnya" type="number">
                Nomor KK Sebelumnya:
            </x-form-group>
        </div>
        <div class="column col-4 col-sm-12">
            <x-form-group-select model="penduduk.hubungan_keluarga_id" :options="$option['hubungan_keluarga']">
                Hubungan Dalam Keluarga <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="column col-4 col-sm-12">
            <x-form-group-select model="penduduk.jenis_kelamin_id" :options="$option['jenis_kelamin']">
                Jenis Kelamin <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="penduduk.agama_id" :options="$option['agama']">
                Agama <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="penduduk.status_kependudukan_id" :options="$option['status_kependudukan']">
                Status Kependudukan <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Data Kelahiran</div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group model="penduduk.akta_lahir">
                Nomor Akta Kelahiran <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="penduduk.tempat_lahir">
                Tempat Lahir <span class="text-error">*</span>:
            </x-form-group>
        </div>
    </div>

    <div class="columns">
        <div class="column col-4 col-sm-12">
            <x-form-group type="date" model="penduduk.tanggal_lahir">
                Tanggal Lahir <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="column col-4 col-sm-12">
            <x-form-group type="time" model="penduduk.waktu_lahir">
                Waktu Lahir <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="column col-4 col-sm-12">
            <x-form-group-select model="penduduk.tempat_dilahirkan_id" :options="$option['tempat_dilahirkan']">
                Tempat Dilahirkan <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <div class="columns">
        <div class="column col-4 col-sm-12">
            <x-form-group-select model="penduduk.jenis_kelahiran_id" :options="$option['jenis_kelahiran']">
                Jenis Kelahiran <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="column col-4 col-sm-12">
            <x-form-group model="penduduk.kelahiran_anak_ke" type="number">
                Kelahiran Anak Ke <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="column col-4 col-sm-12">
            <x-form-group-select model="penduduk.penolong_kelahiran_id" :options="$option['penolong_kelahiran']">
                Penolong Kelahiran <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group model="penduduk.berat_lahir" type="number">
                Berat Lahir (<span class="text-error">kg</span>) <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="penduduk.panjang_lahir" type="number">
                Panjang Lahir (<span class="text-error">cm</span>) <span class="text-error">*</span>:
            </x-form-group>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Pendidikan & Pekerjaan</div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="penduduk.pendidikan_id" :options="$option['pendidikan']">
                Pendidikan <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="penduduk.pekerjaan_id" :options="$option['pekerjaan']">
                Pekerjaan <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Data Kewarganegaraan</div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="penduduk.kewarganegaraan_id" :options="$option['kewarganegaraan']">
                Kewarganegaraan <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="penduduk.dokumen_paspor" type="number">
                Nomor Paspor:
            </x-form-group>
        </div>
    </div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group model="penduduk.tanggal_akhir_paspor" type="date">
                Tanggal paspor berakhir:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="penduduk.dokumen_kitas" type="number">
                Nomor KITAS/KITAP:
            </x-form-group>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Data Orang Tua</div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group model="penduduk.nik_ayah">
                NIK Ayah <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="penduduk.nama_ayah">
                Nama Ayah <span class="text-error">*</span>:
            </x-form-group>
        </div>
    </div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group model="penduduk.nik_ibu">
                NIK Ibu <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="penduduk.nama_ibu">
                Nama Ibu <span class="text-error">*</span>:
            </x-form-group>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Alamat</div>

    <x-form-group model="penduduk.ponsel">
        Telepon <span class="text-error">*</span>:
    </x-form-group>
    <x-form-group model="penduduk.alamat_sebelumnya">
        Alamat Sebelumnya:
    </x-form-group>
    <x-form-group model="penduduk.alamat">
        Alamat Sekarang <span class="text-error">*</span>:
    </x-form-group>

    <br>
    <div class="form-subtitle">Status Perkawinan</div>

    <div class="columns">
        <div class="column col-4 col-sm-12">
            <x-form-group-select model="penduduk.status_perkawinan_id" :options="$option['status_perkawinan']">
                Status Perkawinan <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="column col-4 col-sm-12">
            <x-form-group model="penduduk.akta_kawin" :disabled="$penduduk['status_perkawinan_id'] != $is_kawin">
                No. Akta / Buku Nikah:
            </x-form-group>
        </div>
        <div class="column col-4 col-sm-12">
            <x-form-group model="penduduk.tanggal_kawin" type="date" :disabled="$penduduk['status_perkawinan_id'] != $is_kawin">
                Tanggal Perkawinan:
            </x-form-group>
        </div>
    </div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group model="penduduk.akta_cerai" :disabled="!in_array($penduduk['status_perkawinan_id'], $is_cerai)">
                Akta Perceraian:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="penduduk.tanggal_cerai" type="date" :disabled="!in_array($penduduk['status_perkawinan_id'], $is_cerai)">
                Tanggal Perceraian:
            </x-form-group>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Data Kesehatan</div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="penduduk.golongan_darah_id" :options="$option['golongan_darah']">
                Golongan Darah <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="penduduk.cacat_id" :options="$option['cacat']">
                Cacat <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="penduduk.sakit_menahun_id" :options="$option['sakit_menahun']">
                Sakit Menahun <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group-select model="penduduk.cara_kb_id" :options="$option['cara_kb']">
                Akseptor KB:
            </x-form-group-select>
        </div>
    </div>

    <br>
    <x-submit text="Simpan" />

</form>