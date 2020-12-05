<?php

namespace App\Http\Livewire\Keluarga;

use App\Models\Cluster\Lingkungan;
use App\Models\Cluster\Rt;
use App\Models\Cluster\Rw;
use App\Models\Kependudukan\Keluarga;
use App\Models\Kependudukan\Penduduk;
use App\Models\Label\Label;
use Livewire\Component;

class Update extends Component
{
    public $keluargaId;
    public $lingkungan_id, $rw_id;
    public $rt_id, $no_kk, $tanggal_cetak;
    public $kepala_id, $searchKepala, $findedKepala;
    public $anggota_id, $searchAnggota, $findedAnggota;

    public function mount($id)
    {
        $keluarga = Keluarga::findOrFail($id);
        $rt = Rt::findOrFail($keluarga->rt_id);

        $this->keluargaId = $id;
        $this->no_kk = $keluarga->no_kk;
        $this->tanggal_cetak = $keluarga->tanggal_cetak;

        $this->lingkungan_id = $rt->rw->lingkungan_id;
        $this->rw_id = $rt->rw->id;
        $this->rt_id = $rt->id;
        
        $this->kepala_id = $keluarga->kepala()->id;
        $this->searchKepala = $keluarga->kepala()->nik;
    }

    /**
     * Menambahkan penduduk terpilih sebagai anggota
     */
    public function addAnggota(Penduduk $penduduk)
    {
        $penduduk->keluarga_id = $this->keluargaId;
        $penduduk->save();

        $this->searchAnggota = null;
    }

    /**
     * Menghapus penduduk dari anggota keluarga
     */
    public function removeAnggota(Penduduk $penduduk)
    {
        // tidak bisa menghapus kepala keluarga
        $labelKepala = Label::whereLabel('Kepala Keluarga')->first();
        if ($penduduk->hubungan_keluarga_id != $labelKepala->id) {
            $penduduk->keluarga_id = null;
            $penduduk->save();
        }

        $this->searchAnggota = null;
    }

    public function submit()
    {
        $this->validate([
            'no_kk' => 'required',
            'rt_id' => 'required',
            'kepala_id' => 'exists:penduduk,id'
        ], [], [
            'no_kk' => 'Nomor KK',
            'kepala_id' => 'Kepala Keluarga',
        ]);

        $keluarga = Keluarga::findOrFail($this->keluargaId);
        $keluarga->no_kk = $this->no_kk;
        $keluarga->rt_id = $this->rt_id;
        $keluarga->tanggal_cetak = $this->tanggal_cetak;
        $keluargaSaved = $keluarga->save();

        $kepala = Penduduk::findOrFail($this->kepala_id);
        $kepala->keluarga_id = $this->keluargaId;
        $kepalaSaved = $kepala->save();

        if ($keluargaSaved && $kepalaSaved) {
            session()->flash('success', 'Pembaruan berhasil di simpan.');
        } else {
            session()->flash('failed', 'Gagal menyimpan pembaruan.');
        }
    }

    public function render()
    {
        $option['lingkungan'] = Lingkungan::all();
        $option['rw'] = $this->lingkungan_id ? Rw::where('lingkungan_id', $this->lingkungan_id)->get() : [];
        $option['rt'] = $this->rw_id ? Rt::where('rw_id', $this->rw_id)->get() : [];

        $findKepala = Penduduk::where('nik', 'like', "%$this->searchKepala%")
                                    ->orWhere('nama', 'like', "%$this->searchKepala%")
                                    ->get();

        $findAnggota = Penduduk::where('nik', 'like', "%$this->searchAnggota%")
                                    ->orWhere('nama', 'like', "%$this->searchAnggota%")
                                    ->get();

        $this->findedKepala = Penduduk::where('nik', $this->searchKepala)->first();
        $this->findedAnggota = Penduduk::where('nik', $this->searchAnggota)->first();

        return view('livewire.keluarga.update', [
            'anggota' => Keluarga::findOrFail($this->keluargaId)->anggota,
            'option' => $option,
            'currentLingkungan' => Lingkungan::findOrFail($this->lingkungan_id),
            'currentRw' => Rw::findOrFail($this->rw_id),
            'currentRt' => Rt::findOrFail($this->rt_id),
            'currentKepala' => Penduduk::findOrFail($this->kepala_id),
            'listKepala' => $this->searchKepala ? $findKepala : [],
            'listAnggota' => $this->searchAnggota ? $findAnggota : [],
            'findedKepala' => $this->findedKepala,
            'findedAnggota' => $this->findedAnggota,
        ]);
    }
}
