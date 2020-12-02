<?php

namespace App\Http\Livewire\Keluarga;

use App\Models\Cluster\Lingkungan;
use App\Models\Cluster\Rt;
use App\Models\Cluster\Rw;
use App\Models\Kependudukan\Keluarga;
use App\Models\Kependudukan\Penduduk;
use App\Models\Label\Label;
use Livewire\Component;

class Create extends Component
{
    public $lingkungan_id, $rw_id, $rt_id;
    public $no_kk, $tanggal_cetak;
    public $kepala_id, $find;

    /**
     * Lifecycle bawaan Livewire
     * Jika properti $find di update
     */
    public function updatedFind($nik)
    {
        // dd($nik);
        $penduduk = Penduduk::where('nik', $nik);
        if ($penduduk->first()) {
            $this->kepala_id = $penduduk->first()->id;
        }
    }

    /**
     * Reset input pada form
     */
    public function resetInput()
    {
        $this->lingkungan_id = null;
        $this->rw_id = null;
        $this->rt_id = null;
        $this->no_kk = null;
        $this->tanggal_cetak = null;
        $this->kepala_id = null;
        $this->find = null;
    }

    /**
     * Sumit form
     */
    public function submit()
    {
        $this->validate([
            'rt_id' => 'required',
            'no_kk' => 'required|numeric|unique:keluarga',
            'tanggal_cetak' => 'nullable',
            'kepala_id' => 'required'
        ], [], [
            'rt_id' => 'Nomor RT',
            'no_kk' => 'Nomor KK',
            'tanggal_cetak' => 'Tanggal Cetak',
            'kepala_id' => 'Kepala Keluarga'
        ]);

        $keluarga = Keluarga::create([
            'no_kk' => $this->no_kk,
            'rt_id' => $this->rt_id,
            'tanggal_cetak' => $this->tanggal_cetak,
        ]);

        if ($keluarga) {

            // Assign penduduk (kepala_id) sebagai kepala keluarga
            $kepalaKeluarga = Label::whereLabel('Kepala Keluarga')->first()->id;
            $penduduk = Penduduk::findOrFail($this->kepala_id);
            $penduduk->hubungan_keluarga_id = $kepalaKeluarga;
            $penduduk->keluarga_id = $keluarga->id;
            $penduduk->save();

            $this->resetInput();
            session()->flash('success', 'Berhasil menyimpan data.');

        } else {

            session()->flash('failed', 'Gagal menyimpan data.');

        }
    }

    /**
     * Render view
     */
    public function render()
    {
        $findPenduduk = Penduduk::where('nik', 'like', "%$this->find%")
                                    ->orWhere('nama', 'like', "%$this->find%")
                                    ->get();

        $finded = Penduduk::where('nik', $this->find)->first();

        $option = [];
        $option['lingkungan'] = Lingkungan::all();
        $option['rw'] = $this->lingkungan_id ? Rw::where('lingkungan_id', $this->lingkungan_id)->get() : [];
        $option['rt'] = $this->rw_id ? Rt::where('rw_id', $this->rw_id)->get() : [];

        return view('livewire.keluarga.create', [
            'option' => $option,
            'list' => $this->find ? $findPenduduk : [],
            'finded' => $finded,
        ]);
    }
}
