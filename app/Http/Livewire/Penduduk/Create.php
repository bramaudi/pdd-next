<?php

namespace App\Http\Livewire\Penduduk;

use App\Http\Requests\Penduduk\PendudukStore;
use App\Models\Cluster\Lingkungan;
use App\Models\Cluster\Rt;
use App\Models\Cluster\Rw;
use App\Models\Kependudukan\Penduduk;
use App\Models\Label\Label;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Create extends Component
{
    private $cachePrefix = 'pendudukCreate_'; // cegah kemungkinan duplikasi
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
    public function mount()
    {
        $schema = Schema::getColumnListing('penduduk');

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
        $this->resetErrorBag();

        $request = new PendudukStore;

        $data = $this->penduduk;
        $rule = $request->rules($data);
        $attr = $request->attributes();

        $validator = Validator::make($data, $rule, [], $attr);
        $validatedData = $validator->validate();

        $create = Penduduk::create($validatedData);

        if ($create) {
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
