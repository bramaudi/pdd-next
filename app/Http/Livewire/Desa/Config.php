<?php

namespace App\Http\Livewire\Desa;

use App\Models\Indonesia\District;
use App\Models\Indonesia\Province;
use App\Models\Indonesia\Regency;
use App\Models\Indonesia\Village;
use App\Models\Meta\Meta;
use Livewire\Component;

class Config extends Component
{
    /** Model */
    public $id_desa, $nama, $email, $telepon, $website, $tentang;
    public $kades_nama, $kades_nip, $camat_nama, $camat_nip;
    public $province_id, $regency_id, $district_id, $village_id;

    /**
     * Berikan value dari database
     */
    public function mount() : void
    {
        $meta = Meta::where('key', 'portal-desa-digital')->first();
        $config = json_decode($meta->value, true);

        foreach(array_keys($config) as $key) {
            $this->$key = $config[$key];
        }
    }

    /**
     * Ganti provinsi -> reset id kabupaten & kecamatan
     */
    public function changeProvince($province_id)
    {
        $this->province_id = $province_id;
        $this->regency_id = null;
        $this->district_id = null;
        $this->village_id = null;
    }

    public function changeRegency($regency_id)
    {
        $this->regency_id = $regency_id;
        $this->district_id = null;
        $this->village_id = null;
    }

    public function changeDistrict($district_id)
    {
        $this->district_id = $district_id;
        $this->village_id = null;
    }

    /**
     * Submit update config
     */
    public function submit() : void
    {
        $validated = $this->validate([
            // Rules
            'id_desa' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'website' => 'required|url',
            'tentang' => 'required',

            'kades_nama' => 'required',
            'kades_nip' => 'required|numeric',
            'camat_nama' => 'required',
            'camat_nip' => 'required|numeric',

            'province_id' => 'required|numeric',
            'regency_id' => 'required|numeric',
            'district_id' => 'required|numeric',
            'village_id' => 'required|numeric',
        ], [], [
            // Custom property
            'nama' => 'Nama Desa',
            'email' => 'Email',
            'telepon' => 'Telepon',
            'website' => 'Website',
            'tentang' => 'Tentang',
            'kades_nama' => 'Nama Kades',
            'kades_nip' => 'NIP Kades',
            'camat_nama' => 'Nama Camat',
            'camat_nip' => 'NIP Camat',
            'province_id' => 'Provinsi',
            'regency_id' => 'Kabupaten',
            'district_id' => 'Kecamatan',
            'village_id' => 'Kelurahan',
        ]);

        if ($validated)
        {
            session()->flash('success', 'Data berhasil disimpan.');
            $meta = Meta::where('key', 'portal-desa-digital')->first();
            $meta->value = json_encode($validated);
            $meta->save();
        }
        else {
            session()->flash('failed', 'Kesalahan saat menyimpan.');
        }

    }

    public function render()
    {
        return view('livewire.desa.config', [
            'provinces' => Province::all(),
            'regencies' => $this->province_id ? Regency::where('province_id', $this->province_id)->get() : [],
            'districts' => $this->regency_id ? District::where('regency_id', $this->regency_id)->get() : [],
            'villages' => $this->district_id ? Village::where('district_id', $this->district_id)->get() : [],
            'province_name' => Province::find($this->province_id)->name,
            'regency_name' => $this->regency_id ? Regency::find($this->regency_id)->name : '--',
            'district_name' => $this->district_id ? District::find($this->district_id)->name : '--',
            'village_name' => $this->village_id ? Village::find($this->village_id)->name : '--',
        ]);
    }
}
