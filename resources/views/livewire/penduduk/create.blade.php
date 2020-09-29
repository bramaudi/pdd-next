<form wire:submit.prevent="submit" class="side-control">

    @error('rt_id')
        <div class="toast toast-error">
            Mohon pilih dusun -> RW -> RT
        </div>
    @enderror

    <div class="columns">
        <div class="column col-4 col-sm-12">
            <label class="form-label" for="input-input.dusun">
                Dusun:
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
                RW:
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
                RT:
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
                NIK:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.nama">
                Nama Lengkap:
            </x-form-group>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Status Kepemilikan KTP</div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <label class="form-label" for="input-input.ktpel">
                KTP Elektronik:
            </label>
            <select wire:change="$set('input.ktp_el_id', $event.target.value)" class="form-select" id="input-input.ktpel">
                <option value="">--</option>
                @foreach($option['ktp_el'] as $r)
                    <option value="{{ $r->id }}">{{ $r->label }}</option>
                @endforeach
            </select>
        </div>
        <div class="column col-6 col-sm-12">
            <label class="form-label" for="input-input.sttsrekam">
                Status Rekam:
            </label>
            <select wire:change="$set('input.status_rekam_id', $event.target.value)" class="form-select" id="input-input.sttsrekam">
                <option value="">--</option>
                @foreach($option['status_rekam'] as $r)
                    <option value="{{ $r->id }}">{{ $r->label }}</option>
                @endforeach
            </select>
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
            <label class="form-label" for="input-input.hubkel">
                Hubungan Dalam Keluarga:
            </label>
            <select wire:change="$set('input.hubungan_keluarga_id', $event.target.value)" class="form-select" id="input-input.hubkel">
                <option value="">--</option>
                @foreach($option['hubungan_keluarga'] as $r)
                    <option value="{{ $r->id }}">{{ $r->label }}</option>
                @endforeach
            </select>
        </div>
        <div class="column col-4 col-sm-12">
            <label class="form-label" for="input-input.gender">
                Jenis Kelamin:
            </label>
            <select wire:change="$set('input.jenis_kelamin_id', $event.target.value)" class="form-select" id="input-input.gender">
                <option value="">--</option>
                @foreach($option['jenis_kelamin'] as $r)
                    <option value="{{ $r->id }}">{{ $r->label }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <label class="form-label" for="input-input.agama">
                Agama:
            </label>
            <select wire:change="$set('input.agama_id', $event.target.value)" class="form-select" id="input-input.agama">
                <option value="">--</option>
                @foreach($option['agama'] as $r)
                    <option value="{{ $r->id }}">{{ $r->label }}</option>
                @endforeach
            </select>
        </div>
        <div class="column col-6 col-sm-12">
            <label class="form-label" for="input-input.statuspnddk">
                Status Kependudukan:
            </label>
            <select wire:change="$set('input.status_kependudukan_id', $event.target.value)" class="form-select" id="input-input.statuspnddk">
                <option value="">--</option>
                @foreach($option['status_kependudukan'] as $r)
                    <option value="{{ $r->id }}">{{ $r->label }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Data Kelahiran</div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.akta_lahir">
                Nomor Akta Kelahiran:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.tempat_lahir">
                Tempat Lahir:
            </x-form-group>
        </div>
    </div>

    <div class="columns">
        <div class="column col-4 col-sm-12">
            <x-form-group type="date" model="input.tanggal_lahir">
                Tanggal Lahir:
            </x-form-group>
        </div>
        <div class="column col-4 col-sm-12">
            <x-form-group type="time" model="input.waktu_lahir">
                Waktu Lahir:
            </x-form-group>
        </div>
        <div class="column col-4 col-sm-12">
            <label class="form-label" for="input-input.tmptdilhrkn">
                Tempat Dilahirkan:
            </label>
            <select wire:change="$set('input.tempat_dilahirkan_id', $event.target.value)" class="form-select" id="input-input.tmptdilhrkn">
                <option value="">--</option>
                @foreach($option['tempat_dilahirkan'] as $r)
                    <option value="{{ $r->id }}">{{ $r->label }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.berat_lahir" type="number">
                Berat Lahir (kg):
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.panjang_lahir" type="number">
                Panjang Lahir:
            </x-form-group>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Pendidikan & Pekerjaan</div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <label class="form-label" for="input-input.pendidikan">
                Pendidikan:
            </label>
            <select wire:change="$set('input.pendidikan_id', $event.target.value)" class="form-select" id="input-input.pendidikan">
                <option value="">--</option>
                @foreach($option['pendidikan'] as $r)
                    <option value="{{ $r->id }}">{{ $r->label }}</option>
                @endforeach
            </select>
        </div>
        <div class="column col-6 col-sm-12">
            <label class="form-label" for="input-input.pekerjaan">
                Pekerjaan:
            </label>
            <select wire:change="$set('input.pekerjaan_id', $event.target.value)" class="form-select" id="input-input.pekerjaan">
                <option value="">--</option>
                @foreach($option['pekerjaan'] as $r)
                    <option value="{{ $r->id }}">{{ $r->label }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Data Kewarganegaraan</div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <label class="form-label" for="input-input.kewarganegaraan">
                Kewarganegaraan:
            </label>
            <select wire:change="$set('input.kewarganegaraan_id', $event.target.value)" class="form-select" id="input-input.kewarganegaraan">
                <option value="">--</option>
                @foreach($option['kewarganegaraan'] as $r)
                    <option value="{{ $r->id }}">{{ $r->label }}</option>
                @endforeach
            </select>
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
                NIK Ayah:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.nama_ayah">
                Nama Ayah:
            </x-form-group>
        </div>
    </div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.nik_ibu">
                NIK Ibu:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.nama_ibu">
                Nama Ibu:
            </x-form-group>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Alamat</div>

    <x-form-group model="input.ponsel">
        Telepon:
    </x-form-group>
    <x-form-group model="input.alamat_sebelumnya">
        Alamat Sebelumnya:
    </x-form-group>
    <x-form-group model="input.alamat">
        Alamat Sekarang:
    </x-form-group>

    <br>
    <div class="form-subtitle">Status Perkawinan</div>

    <div class="columns">
        <div class="column col-4 col-sm-12">
            <label class="form-label" for="input.status_kawin">
                Status <br> Perkawinan:
            </label>
            <select wire:change="$set('input.status_perkawinan_id', $event.target.value)" class="form-select" id="input.status_kawin">
                <option value="">--</option>
                @foreach($option['status_perkawinan'] as $r)
                    <option value="{{ $r->id }}">{{ $r->label }}</option>
                @endforeach
            </select>
        </div>
        <div class="column col-4 col-sm-12">
            <x-form-group model="input.akta_kawin">
                No. Akta Nikah (Buku Nikah) / Perkawinan:
            </x-form-group>
        </div>
        <div class="column col-4 col-sm-12">
            <x-form-group model="input.tanggal_kawin" type="date">
                Tanggal Perkawinan (Wajib jika KAWIN):
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
                Tanggal Perceraian (Wajib jika CERAI):
            </x-form-group>
        </div>
    </div>

    <br>
    <div class="form-subtitle">Data Kesehatan</div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <label class="form-label" for="input.gol_darah">
                Golongan Darah:
            </label>
            <select wire:change="$set('input.golongan_darah_id', $event.target.value)" class="form-select" id="input.gol_darah">
                <option value="">--</option>
                @foreach($option['golongan_darah'] as $r)
                    <option value="{{ $r->id }}">{{ $r->label }}</option>
                @endforeach
            </select>
        </div>
        <div class="column col-6 col-sm-12">
            <label class="form-label" for="input.cacat">
                Cacat:
            </label>
            <select wire:change="$set('input.cacat_id', $event.target.value)" class="form-select" id="input.cacat">
                <option value="">--</option>
                @foreach($option['cacat'] as $r)
                    <option value="{{ $r->id }}">{{ $r->label }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <label class="form-label" for="input.sakitmenahun">
                Sakit Menahun:
            </label>
            <select wire:change="$set('input.sakit_menahun_id', $event.target.value)" class="form-select" id="input.sakitmenahun">
                <option value="">--</option>
                @foreach($option['sakit_menahun'] as $r)
                    <option value="{{ $r->id }}">{{ $r->label }}</option>
                @endforeach
            </select>
        </div>
        <div class="column col-6 col-sm-12">
            <label class="form-label" for="input.carakb">
                Akseptor KB:
            </label>
            <select wire:change="$set('input.cara_kb_id', $event.target.value)" class="form-select" id="input.carakb">
                <option value="">--</option>
                @foreach($option['cara_kb'] as $r)
                    <option value="{{ $r->id }}">{{ $r->label }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <br>
    <x-submit text="Simpan" />

</form>