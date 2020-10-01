<?php

namespace App\Http\Livewire\Penduduk;

use App\Http\Requests\Penduduk\PendudukUpdate;
use App\Models\Cluster\Lingkungan;
use App\Models\Cluster\Rt;
use App\Models\Cluster\Rw;
use App\Models\Kependudukan\Penduduk;
use App\Models\Label\Label;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Update extends Component
{
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
    public function __construct()
    {
        $schema = Schema::getColumnListing('penduduk');

        foreach($schema as $column)
        {
            $this->penduduk[$column] = null;
        }
    }

    /**
     * Mount lalu bind nilai ke properti $penduduk
     */
    public function mount($id)
    {
        $penduduk = Penduduk::find($id);

        foreach(array_keys($this->penduduk) as $key)
        {
            $this->penduduk[$key] = $penduduk->{$key};
        }
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

        return $option;
    }

    /**
     * Membuat array untuk nilai terpilih
     */
    public function makeSelected()
    {
        $selected = [];

        foreach($this->options as $field)
        {
            $label = Label::find($this->penduduk[$field . '_id']);
            $selected[$field] = [];

            if ($label) {
                $selected[$field] = [
                    'value' => $label->id,
                    'name'  => $label->label,
                ];
            }
        }

        return $selected;
    }

    /**
     * Submit Action
     */
    public function submit()
    {
        $this->resetErrorBag();

        $request = new PendudukUpdate;

        $data = $this->penduduk;
        $rule = $request->rules($data);
        $attr = $request->attributes();

        $validator = Validator::make($data, $rule, [], $attr);
        $validatedData = $validator->validate();

        $penduduk = Penduduk::find($this->penduduk['id']);
        $update = $penduduk->update($validatedData);

        if ($update) {
            session()->flash('success', 'Penduduk berhasil ditambahkan.');
        } else {
            session()->flash('failed', 'Penduduk gagal ditambahkan.');
        }
    }
    
    public function render()
    {
        return view('livewire.penduduk.update', [
            'option' => $this->makeOptions(),
            'selected' => $this->makeSelected(),
            'is_kawin' => Label::whereLabel('KAWIN')->first()->id,
            'is_cerai' => [
                Label::whereLabel('CERAI HIDUP')->first()->id,
                Label::whereLabel('CERAI MATI')->first()->id,
            ],
        ]);
    }
}
