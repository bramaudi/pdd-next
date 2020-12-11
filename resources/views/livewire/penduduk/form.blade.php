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

    @if($withCreateKK)
    <div class="flex mb-3">
        <div class="flex-1 pr-3">
            <x-form-group model="no_kk">
                Nomor KK <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="flex-1">
            <x-form-group model="tanggal_cetak" type="date">
                Tanggal Cetak:
            </x-form-group>
        </div>
    </div>
    @endif

    <div class="flex mb-3">
        <div class="flex-1 mr-3">
            <x-form-group model="penduduk.nik">
                NIK <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="flex-1">
            <x-form-group model="penduduk.nama">
                Nama Lengkap <span class="text-error">*</span>:
            </x-form-group>
        </div>
    </div>

    <div class="section">Status Kepemilikan KTP</div>

    <div class="flex mb-3">
        <div class="flex-1 mr-3">
            <x-form-group-select model="penduduk.ktp_el_id" :selected="@$selected['ktp_el']" :options="$option['ktp_el']">
                KTP Elektronik <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="flex-1">
            <x-form-group-select model="penduduk.status_rekam_id" :selected="@$selected['status_rekam']" :options="$option['status_rekam']">
                Status Rekam <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <div class="flex mb-3">
        <div class="flex-1 mr-3">
            <x-form-group model="penduduk.no_kk_sebelumnya" type="number">
                No. KK Sebelumnya:
            </x-form-group>
        </div>
        <div class="flex-1 mr-3">
            <x-form-group-select model="penduduk.hubungan_keluarga_id" :selected="@$selected['hubungan_keluarga']" :options="$option['hubungan_keluarga']" :disabled="$withCreateKK">
                Hubungan Keluarga <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="flex-1">
            <x-form-group-select model="penduduk.jenis_kelamin_id" :selected="@$selected['jenis_kelamin']" :options="$option['jenis_kelamin']">
                Jenis Kelamin <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <div class="flex mb-3">
        <div class="flex-1 mr-3">
            <x-form-group-select model="penduduk.agama_id" :selected="@$selected['agama']" :options="$option['agama']">
                Agama <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="flex-1">
            <x-form-group-select model="penduduk.status_kependudukan_id" :selected="@$selected['status_kependudukan']" :options="$option['status_kependudukan']">
                Status Kependudukan <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>
    
    <div class="section">Data Kelahiran</div>

    <div class="flex mb-3">
        <div class="flex-1 mr-3">
            <x-form-group model="penduduk.akta_lahir">
                Nomor Akta Kelahiran <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="flex-1">
            <x-form-group model="penduduk.tempat_lahir">
                Tempat Lahir <span class="text-error">*</span>:
            </x-form-group>
        </div>
    </div>

    <div class="flex mb-3">
        <div class="flex-1 mr-3">
            <x-form-group type="date" model="penduduk.tanggal_lahir">
                Tanggal Lahir <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="flex-1 mr-3">
            <x-form-group type="time" model="penduduk.waktu_lahir">
                Waktu Lahir <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="flex-1">
            <x-form-group-select model="penduduk.tempat_dilahirkan_id" :selected="@$selected['tempat_dilahirkan']" :options="$option['tempat_dilahirkan']">
                Tempat Dilahirkan <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <div class="flex mb-3">
        <div class="flex-1 mr-3">
            <x-form-group-select model="penduduk.jenis_kelahiran_id" :selected="@$selected['jenis_kelahiran']" :options="$option['jenis_kelahiran']">
                Jenis Kelahiran <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="flex-1 mr-3">
            <x-form-group model="penduduk.kelahiran_anak_ke" type="number">
                Kelahiran Anak Ke <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="flex-1">
            <x-form-group-select model="penduduk.penolong_kelahiran_id" :selected="@$selected['penolong_kelahiran']" :options="$option['penolong_kelahiran']">
                Penolong Kelahiran <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <div class="flex mb-3">
        <div class="flex-1 mr-3">
            <x-form-group model="penduduk.berat_lahir" type="number">
                Berat Lahir (<span class="text-error">kg</span>) <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="flex-1">
            <x-form-group model="penduduk.panjang_lahir" type="number">
                Panjang Lahir (<span class="text-error">cm</span>) <span class="text-error">*</span>:
            </x-form-group>
        </div>
    </div>

    <div class="section">Pendidikan & Pekerjaan</div>

    <div class="flex mb-3">
        <div class="flex-1 mr-3">
            <x-form-group-select model="penduduk.pendidikan_id" :selected="@$selected['pendidikan']" :options="$option['pendidikan']">
                Pendidikan <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="flex-1">
            <x-form-group-select model="penduduk.pekerjaan_id" :selected="@$selected['pekerjaan']" :options="$option['pekerjaan']">
                Pekerjaan <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <div class="section">Data Kewarganegaraan</div>

    <div class="flex mb-3">
        <div class="flex-1 mr-3">
            <x-form-group-select model="penduduk.kewarganegaraan_id" :selected="@$selected['kewarganegaraan']" :options="$option['kewarganegaraan']">
                Kewarganegaraan <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="flex-1">
            <x-form-group model="penduduk.dokumen_paspor" type="number">
                Nomor Paspor:
            </x-form-group>
        </div>
    </div>

    <div class="flex mb-3">
        <div class="flex-1 mr-3">
            <x-form-group model="penduduk.tanggal_akhir_paspor" type="date">
                Tanggal paspor berakhir <span class="text-error mr-2">?</span>:
            </x-form-group>
        </div>
        <div class="flex-1">
            <x-form-group model="penduduk.dokumen_kitas" type="number">
                Nomor KITAS/KITAP:
            </x-form-group>
        </div>
    </div>

    <div class="section">Data Orang Tua</div>

    <div class="flex mb-3">
        <div class="flex-1 mr-3">
            <x-form-group model="penduduk.nik_ayah">
                NIK Ayah <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="flex-1">
            <x-form-group model="penduduk.nama_ayah">
                Nama Ayah <span class="text-error">*</span>:
            </x-form-group>
        </div>
    </div>

    <div class="flex mb-3">
        <div class="flex-1 mr-3">
            <x-form-group model="penduduk.nik_ibu">
                NIK Ibu <span class="text-error">*</span>:
            </x-form-group>
        </div>
        <div class="flex-1">
            <x-form-group model="penduduk.nama_ibu">
                Nama Ibu <span class="text-error">*</span>:
            </x-form-group>
        </div>
    </div>

    <div class="section">Alamat</div>

    <x-form-group model="penduduk.ponsel">
        Telepon <span class="text-error">*</span>:
    </x-form-group>

    <x-form-group model="penduduk.alamat_sebelumnya">
        Alamat Sebelumnya:
    </x-form-group>

    <x-form-group model="penduduk.alamat">
        Alamat Sekarang <span class="text-error">*</span>:
    </x-form-group>

    <div class="section">Status Perkawinan</div>

    <div class="flex mb-3">
        <div class="flex-1 mr-3">
            <x-form-group-select model="penduduk.status_perkawinan_id" :selected="@$selected['status_perkawinan']" :options="$option['status_perkawinan']">
                Status Perkawinan <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="flex-1 mr-3">
            <x-form-group model="penduduk.akta_kawin" :disabled="$penduduk['status_perkawinan_id'] != $is_kawin">
                No. Akta / Buku Nikah <span class="text-error mr-2">?</span>:
            </x-form-group>
        </div>
        <div class="flex-1">
            <x-form-group model="penduduk.tanggal_kawin" type="date" :disabled="$penduduk['status_perkawinan_id'] != $is_kawin">
                Tanggal Perkawinan <span class="text-error mr-2">?</span>:
            </x-form-group>
        </div>
    </div>

    <div class="flex mb-3">
        <div class="flex-1 mr-3">
            <x-form-group model="penduduk.akta_cerai" :disabled="!in_array($penduduk['status_perkawinan_id'], $is_cerai)">
                Akta Perceraian <span class="text-error mr-2">?</span>:
            </x-form-group>
        </div>
        <div class="flex-1">
            <x-form-group model="penduduk.tanggal_cerai" type="date" :disabled="!in_array($penduduk['status_perkawinan_id'], $is_cerai)">
                Tanggal Perceraian <span class="text-error mr-2">?</span>:
            </x-form-group>
        </div>
    </div>

    <div class="section">Data Kesehatan</div>

    <div class="flex mb-3">
        <div class="flex-1 mr-3">
            <x-form-group-select model="penduduk.golongan_darah_id" :selected="@$selected['golongan_darah']" :options="$option['golongan_darah']">
                Golongan Darah <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="flex-1">
            <x-form-group-select model="penduduk.cacat_id" :selected="@$selected['cacat']" :options="$option['cacat']">
                Cacat <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
    </div>

    <div class="flex mb-3">
        <div class="flex-1 mr-3">
            <x-form-group-select model="penduduk.sakit_menahun_id" :selected="@$selected['sakit_menahun']" :options="$option['sakit_menahun']">
                Sakit Menahun <span class="text-error">*</span>:
            </x-form-group-select>
        </div>
        <div class="flex-1">
            <x-form-group-select model="penduduk.cara_kb_id" :selected="@$selected['cara_kb']" :options="$option['cara_kb']">
                Akseptor KB:
            </x-form-group-select>
        </div>
    </div>

    <x-submit text="Simpan" />

</form>