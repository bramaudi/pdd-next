<div>
    <div class="columns">
        <div class="column col-6 col-sm-12">
            <div class="card">
                <div class="card-header"><strong>Desa</strong></div>
                <div class="card-body">
                    <label class="form-checkbox">
                    <input wire:model="permissions.desa_identitas" wire:click="changed" type="checkbox">
                        <i class="form-icon"></i> Identitas Desa
                    </label>
                    <label class="form-checkbox">
                    <input wire:model="permissions.desa_wilayah" wire:click="changed" type="checkbox">
                        <i class="form-icon"></i> Wilayah Administratif
                    </label>
                </div>
            </div>
        </div>
        <div class="column col-6 col-sm-12">
            <div class="card">
                <div class="card-header"><strong>Kependudukan</strong></div>
                <div class="card-body">
                    <label class="form-checkbox">
                    <input wire:model="permissions.kependudukan_penduduk" wire:click="changed" type="checkbox">
                        <i class="form-icon"></i> Penduduk
                    </label>
                    <label class="form-checkbox">
                    <input wire:model="permissions.kependudukan_keluarga" wire:click="changed" type="checkbox">
                        <i class="form-icon"></i> Keluarga
                    </label>
                </div>
            </div>
        </div>
        <div class="column col-12 mt-2">
            <div class="card">
                <div class="card-header"><strong>Sistem</strong></div>
                <div class="card-body">
                    <label class="form-checkbox">
                    <input wire:model="permissions.sistem_pengguna" wire:click="changed" type="checkbox">
                        <i class="form-icon"></i> Pengguna
                    </label>
                    <label class="form-checkbox">
                        <input wire:model="permissions.sistem_jabatan" wire:click="changed" type="checkbox">
                        <i class="form-icon"></i> Jabatan
                    </label>
                </div>
            </div>
        </div>
    </div>
    
    <div class="divider"></div>

    @if(session()->has('success'))
        <div class="toast toast-success">{{ session('success') }}</div>
        <div class="divider"></div>
    @endif

    <button wire:click="submit" class="btn btn-lg btn-primary" @if(!$changed) disabled @endif>Simpan</button>
    <button wire:click="resetChanges" class="btn btn-lg btn-link">Reset</button>
</div>
