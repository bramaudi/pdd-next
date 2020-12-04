<?php

namespace App\Http\Livewire\Penduduk;

use App\Http\Requests\Penduduk\PendudukStore;
use App\Models\Cluster\Lingkungan;
use App\Models\Cluster\Rt;
use App\Models\Cluster\Rw;
use App\Models\Kependudukan\Keluarga;
use App\Models\Kependudukan\Penduduk;
use App\Models\Label\Label;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Create extends Component
{
    private $cachePrefix = 'pendudukCreate_'; // cegah kemungkinan duplikasi
    
    // Jika membuat beserta data kk
    public $withCreateKK, $no_kk, $tanggal_cetak;
    
    public $penduduk = [];
    public $lingkungan_id, $rw_id;

    private $options = [
        'ktp_el'              ,
        'status_rekam'        ,
        'hubungan_keluarga'   ,
        'jenis_kelamin'       ,
        'tempat_dilahirkan'   ,
        'jenis_kelahiran'     ,
        'penolong_kelahiran'  ,
        'agama'               ,
        'status_kependudukan' ,
        'pendidikan'          ,
        'pekerjaan'           ,
        'status_perkawinan'   ,
        'kewarganegaraan'     ,
        'golongan_darah'      ,
        'cacat'               ,
        'sakit_menahun'       ,
        'cara_kb'             ,
    ];

    /**
     * Injek index pada $this->input dengan nama kolom table
     */
    public function mount($kk = false)
    {
        $this->withCreateKK = $kk;
        $schema = Schema::getColumnListing('penduduk');

        $this->no_kk = session($this->cachePrefix.'no_kk');
        $this->tanggal_cetak = session($this->cachePrefix.'tanggal_cetak');
        foreach($schema as $column)
        {
            $this->penduduk[$column] = session($this->cachePrefix.$column);
        }

    }

    /**
     * "updated" = lifecycle bawaan livewire.
     * Untuk menyimpan cache data pada form input
     */
    public function updated($name, $value)
    {
        $name = str_replace('penduduk.', '', $name);
        session([$this->cachePrefix.$name => $value]);
    }

    /**
     * Membuat array untuk list opsi pada form select
     */
    public function makeOptions()
    {
        $option = [];

        foreach($this->options as $field)
        {
            $option[$field] = [];
            $labelName = str_replace('_', '-', $field);

            foreach(Label::whereLabel($labelName)->first()->turunan as $label)
            {
                array_push($option[$field], [
                    'value' => $label->id,
                    'name'  => $label->label,
                ]);
            }
        }

        $option['lingkungan'] = Lingkungan::all();
        $option['rw'] = $this->lingkungan_id ? Rw::where('lingkungan_id', $this->lingkungan_id)->get() : [];
        $option['rt'] = $this->rw_id ? Rt::where('rw_id', $this->rw_id)->get() : [];
        return $option;
    }

    /**
     * Hapus semua input
     */
    public function resetInput()
    {
        $this->no_kk = null;
        $this->tanggal_cetak = null;
        session()->forget($this->cachePrefix.'no_kk');
        session()->forget($this->cachePrefix.'tanggal_cetak');

        foreach (array_keys($this->penduduk) as $key) {
            $this->penduduk[$key] = null;
            session()->forget($this->cachePrefix.$key);
        }
    }

    /**
     * Submit Action
     */
    public function submit()
    {
        $this->resetErrorBag(); // diperlukan untuk nama model nested

        $request = new PendudukStore;
        
        $data = $this->penduduk;
        $rule = $request->rules($data);
        $attr = $request->attributes();

        if ($this->withCreateKK) {
            $rule['no_kk'] = 'required';
            $attr['no_kk'] = 'Nomor KK';
            $data['no_kk'] = $this->no_kk;
            $attr['tanggal_cetak'] = 'Tanggal Cetak KK';
            $data['tanggal_cetak'] = $this->tanggal_cetak;

            $labelKepalaKeluarga = Label::whereLabel('Kepala Keluarga')->first();
            $data['hubungan_keluarga_id'] = $labelKepalaKeluarga->id;
        }

        $validator = Validator::make($data, $rule, [], $attr);
        $validatedData = $validator->validate();
        
        if ($this->withCreateKK) {
            $createKK = Keluarga::create([
                'no_kk' => $this->no_kk,
                'rt_id' => $this->penduduk['rt_id'],
                'tanggal_cetak' => $this->tanggal_cetak
            ]);
            $createPenduduk = Penduduk::create(array_merge(
                $validatedData,
                ['keluarga_id' => $createKK->id]
            ));
        } else {
            $createPenduduk = Penduduk::create($validatedData);
        }

        if ($createPenduduk) {
            $this->resetInput();
            session()->flash('success', 'Penduduk berhasil ditambahkan.');
        } else {
            session()->flash('failed', 'Penduduk gagal ditambahkan.');
        }
    }
    
    public function render()
    {
        return view('livewire.penduduk.create', [
            'option' => $this->makeOptions(),
            'is_kawin' => Label::whereLabel('KAWIN')->first()->id,
            'is_cerai' => [
                Label::whereLabel('CERAI HIDUP')->first()->id,
                Label::whereLabel('CERAI MATI')->first()->id,
            ],
        ]);
    }
}
