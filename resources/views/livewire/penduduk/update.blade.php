<form wire:submit.prevent="submit" class="side-control">

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.nik">
                NIK:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.nama">
                Nama:
            </x-form-group>
        </div>
    </div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <label class="form-label" for="input-input.hubkel">
                Hubungan Dalam Keluarga:
            </label>
            <select wire:change="$set('input.hubungan_keluarga_id', $event.target.value)" class="form-select" id="input-input.hubkel">
                <option value="{{ $input['hubungan_keluarga_id'] }}">{{ $label['hubungan_keluarga'] }}</option>
                <option value="">--</option>
                @foreach($option['hubungan_keluarga'] as $r)
                    <option value="{{ $r->id }}">{{ $r->label }}</option>
                @endforeach
            </select>
        </div>
        <div class="column col-6 col-sm-12">
            <label class="form-label" for="input-input.gender">
                Jenis Kelamin:
            </label>
            <select wire:change="$set('input.jenis_kelamin_id', $event.target.value)" class="form-select" id="input-input.gender">
                <option value="{{ $input['jenis_kelamin_id'] }}">{{ $label['jenis_kelamin'] }}</option>
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
                <option value="{{ $input['agama_id'] }}">{{ $label['agama'] }}</option>
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
                <option value="{{ $input['status_kependudukan_id'] }}">{{ $label['status_kependudukan'] }}</option>
                <option value="">--</option>
                @foreach($option['status_kependudukan'] as $r)
                    <option value="{{ $r->id }}">{{ $r->label }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <br>
    <div class="divider" data-content="Data Kelahiran"></div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.tempat_lahir">
                Tempat Lahir:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group type="date" model="input.tanggal_lahir">
                Tanggal Lahir:
            </x-form-group>
        </div>
    </div>

    <br>
    <div class="divider" data-content="Pendidikan & Pekerjaan"></div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <label class="form-label" for="input-input.pendidikan">
                Pendidikan:
            </label>
            <select wire:change="$set('input.pendidikan_id', $event.target.value)" class="form-select" id="input-input.pendidikan">
                <option value="{{ $input['pendidikan_id'] }}">{{ $label['pendidikan'] }}</option>
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
                <option value="{{ $input['pekerjaan_id'] }}">{{ $label['pekerjaan'] }}</option>
                <option value="">--</option>
                @foreach($option['pekerjaan'] as $r)
                    <option value="{{ $r->id }}">{{ $r->label }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <br>
    <div class="divider" data-content="Data Orang Tua"></div>

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
    <div class="divider" data-content="Alamat"></div>

    <div class="columns">
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.ponsel">
                Telepon:
            </x-form-group>
        </div>
        <div class="column col-6 col-sm-12">
            <x-form-group model="input.alamat">
                Alamat:
            </x-form-group>
        </div>
    </div>

    <br>
    <div class="divider" data-content="Status Perkawinan"></div>

    <div class="form-group">
        <label class="form-label" for="input.status_kawin">
            Status Perkawinan:
        </label>
        <select class="form-select" id="input.status_kawin">
            <option value="{{ $input['status_perkawinan_id'] }}">{{ $label['status_perkawinan'] }}</option>
            <option value="">--</option>
            @foreach($option['status_perkawinan'] as $r)
                <option value="{{ $r->id }}">{{ $r->label }}</option>
            @endforeach
        </select>
    </div>

    <br>
    <div class="divider" data-content="Data Kesehatan"></div>

    <div class="form-group">
        <label class="form-label" for="input.gol_darah">
            Golongan Darah:
        </label>
        <select class="form-select" id="input.gol_darah">
            <option value="{{ $input['golongan_darah_id'] }}">{{ $label['golongan_darah'] }}</option>
            <option value="">--</option>
            @foreach($option['golongan_darah'] as $r)
                <option value="{{ $r->id }}">{{ $r->label }}</option>
            @endforeach
        </select>
    </div>

    <x-submit text="Simpan" />

</form>