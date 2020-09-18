<div class="container py-2">
    <form wire:submit.prevent="submit" class="form-horizontal side-control pb-2">

        <div class="divider" data-content="Identitas Desa"></div>

        <input type="hidden" wire:model="id_desa">

        {{-- Nama --}}
        <div class="form-group @error('nama') has-error @enderror">
            <div class="col-3 col-sm-12">
                <label class="form-label" for="input-config-nama">Nama Desa:</label>
            </div>
            <div class="col-9 col-sm-12">
                <input class="form-input" type="text" id="input-config-nama" wire:model="nama" placeholder="Nama Desa">
                @error('nama') <div class="form-input-hint">{{ $message }}</div> @enderror
            </div>
        </div>

        {{-- Email --}}
        <div class="form-group @error('email') has-error @enderror">
            <div class="col-3 col-sm-12">
                <label class="form-label" for="input-config-email">Email Desa:</label>
            </div>
            <div class="col-9 col-sm-12">
                <input class="form-input" type="email" id="input-config-email" wire:model="email" placeholder="Alamat Email">
                @error('email') <div class="form-input-hint">{{ $message }}</div> @enderror
            </div>
        </div>

        {{-- Telepon --}}
        <div class="form-group @error('telepon') has-error @enderror">
            <div class="col-3 col-sm-12">
                <label class="form-label" for="input-config-telp">Telepon:</label>
            </div>
            <div class="col-9 col-sm-12">
                <input class="form-input" type="tel" id="input-config-telp" wire:model="telepon" placeholder="081553049077">
                @error('telepon') <div class="form-input-hint">{{ $message }}</div> @enderror
            </div>
        </div>

        {{-- Website --}}
        <div class="form-group @error('website') has-error @enderror">
            <div class="col-3 col-sm-12">
                <label class="form-label" for="input-config-website">Website:</label>
            </div>
            <div class="col-9 col-sm-12">
                <input class="form-input" type="url" id="input-config-website" wire:model="website" placeholder="http://">
                @error('website') <div class="form-input-hint">{{ $message }}</div> @enderror
            </div>
        </div>

        {{-- Tentang --}}
        <div class="form-group @error('tentang') has-error @enderror">
            <div class="col-3 col-sm-12">
                <label class="form-label" for="input-config-about">Tentang:</label>
            </div>
            <div class="col-9 col-sm-12">
                <textarea class="form-input" id="input-config-about" rows="5" wire:model="tentang"></textarea>
                @error('tentang') <div class="form-input-hint">{{ $message }}</div> @enderror
            </div>
        </div>

        <br>
        <div class="divider" data-content="Identitas Pemerintah"></div>

        {{-- Kepala Desa --}}
        <div class="form-group">
            <div class="col-3 col-sm-12">
                <label class="form-label" for="input-config-kades-name">Kepala Desa:</label>
            </div>
            <div class="col-9 col-sm-12 columns col-gapless">
                <div class="column col-6 col-sm-12">
                    <input class="form-input @error('kades_nama') is-error @enderror" type="text" id="input-config-kades-name" wire:model="kades_nama" placeholder="Nama">
                    @error('kades_nama') <div class="form-input-hint">{{ $message }}</div> @enderror
                </div>
                <div class="column col-6 col-sm-12">
                    <input class="form-input @error('kades_nip') is-error @enderror" type="number" id="input-config-kades-nip" wire:model="kades_nip" placeholder="Nip">
                    @error('kades_nip') <div class="form-input-hint">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>

        {{-- Camat --}}
        <div class="form-group">
            <div class="col-3 col-sm-12">
                <label class="form-label" for="input-config-camat-name">Camat:</label>
            </div>
            <div class="col-9 col-sm-12 columns col-gapless">
                <div class="column col-6 col-sm-12">
                    <input class="form-input @error('camat_nama') is-error @enderror" type="text" id="input-config-camat-name" wire:model="camat_nama" placeholder="Nama">
                    @error('camat_nama') <div class="form-input-hint">{{ $message }}</div> @enderror
                </div>
                <div class="column col-6 col-sm-12">
                    <input class="form-input @error('camat_nip') is-error @enderror" type="number" id="input-config-camat-nip" wire:model="camat_nip" placeholder="Nip">
                    @error('camat_nip') <div class="form-input-hint">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>

        <br>
        <div class="divider" data-content="Alamat Desa"></div>

        {{-- Provinsi --}}
        <div class="form-group @error('province_id') has-error @enderror">
            <div class="col-3 col-sm-12">
                <label class="form-label" for="input-config-provincies">Provinsi:</label>
            </div>
            <div class="col-9 col-sm-12">
                <select class="form-select" id="input-config-provincies" wire:change="$set('province_id', $event.target.value)">
                    <option value="{{ $province_id }}">{{ $province_name }}</option>
                    <option value="">--</option>
                    @foreach($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                </select>
                @error('province_id') <div class="form-input-hint">{{ $message }}</div> @enderror
            </div>
        </div>

        {{-- Kabupaten --}}
        <div class="form-group @error('regency_id') has-error @enderror">
            <div class="col-3 col-sm-12">
                <label class="form-label" for="input-config-provincies">Kabupaten:</label>
            </div>
            <div class="col-9 col-sm-12">
                <select class="form-input" id="input-config-provincies" wire:change="$set('regency_id', $event.target.value)">
                    <option value="{{ $regency_id }}">{{ $regency_name }}</option>
                    <option value="">--</option>
                    @foreach($regencies as $regency)
                        <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                    @endforeach
                </select>
                @error('regency_id') <div class="form-input-hint">{{ $message }}</div> @enderror
            </div>
        </div>

        {{-- Kecamatan --}}
        <div class="form-group @error('district_id') has-error @enderror">
            <div class="col-3 col-sm-12">
                <label class="form-label" for="input-config-provincies">Kecamatan:</label>
            </div>
            <div class="col-9 col-sm-12">
                <select class="form-input" id="input-config-provincies" wire:change="$set('district_id', $event.target.value)">
                    <option value="{{ $district_id }}">{{ $district_name }}</option>
                    <option value="">--</option>
                    @foreach($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                    @endforeach
                </select>
                @error('district_id') <div class="form-input-hint">{{ $message }}</div> @enderror
            </div>
        </div>

        @if(session()->has('success'))
            @include('includes/toast-above-button', ['name' => 'success'])
        @endif

        @if(session()->has('failed'))
            @include('includes/toast-above-button', ['name' => 'failed'])
        @endif
        
        <div class="form-group">
            <button class="btn btn-primary" wire:loading.attr="disabled" wire:loading.class="loading" wire:target="submit">Simpan</button>
        </div>

    </form>
</div>