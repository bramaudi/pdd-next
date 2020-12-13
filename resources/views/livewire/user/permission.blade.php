<div class="card form">
    <div class="section">Desa</div>
    <div class="mb-3">
        <label class="form-checkbox">
            <input wire:model="permissions.desa_identitas" wire:click="changed" type="checkbox">
            Identitas Desa
        </label>
        <label class="form-checkbox">
            <input wire:model="permissions.desa_wilayah" wire:click="changed" type="checkbox">
            Wilayah Administratif
        </label>
    </div>

    <div class="section">Kependudukan</div>
    <div class="mb-3">
        <label class="form-checkbox">
            <input wire:model="permissions.kependudukan_penduduk" wire:click="changed" type="checkbox">
            Penduduk
        </label>
        <label class="form-checkbox">
            <input wire:model="permissions.kependudukan_keluarga" wire:click="changed" type="checkbox">
            Keluarga
        </label>
    </div>
    
    <div class="section">Sistem</div>
    <div class="mb-3">
        <label class="form-checkbox">
            <input wire:model="permissions.sistem_pengguna" wire:click="changed" type="checkbox">
            Pengguna
        </label>
        <label class="form-checkbox">
            <input wire:model="permissions.sistem_jabatan" wire:click="changed" type="checkbox">
            Jabatan
        </label>
    </div>
    
    <x-submit text="Simpan" :disabled="!$changed" />
    <button wire:click="resetChanges" class="btn">Reset</button>

</div>
