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
    public $input = [];
    public $lingkungan_id, $rw_id;

    /**
     * Injek index pada $this->input dengan nama kolom table
     */
    public function __construct()
    {
        $schema = Schema::getColumnListing('penduduk');

        foreach($schema as $column)
        {
            $this->input[$column] = null;
        }
    }

    public function makeOptions()
    {
        $fields = [
            'ktp_el'              => Label::whereLabel('ktp-el'),
            'status_rekam'        => Label::whereLabel('status-rekam'),
            'hubungan_keluarga'   => Label::whereLabel('hubungan-keluarga'),
            'jenis_kelamin'       => Label::whereLabel('jenis-kelamin'),
            'tempat_dilahirkan'   => Label::whereLabel('tempat-dilahirkan'),
            'jenis_kelahiran'     => Label::whereLabel('jenis-kelahiran'),
            'penolong_kelahiran'  => Label::whereLabel('penolong-kelahiran'),
            'agama'               => Label::whereLabel('agama'),
            'status_kependudukan' => Label::whereLabel('status-kependudukan'),
            'pendidikan'          => Label::whereLabel('pendidikan'),
            'pekerjaan'           => Label::whereLabel('pekerjaan'),
            'status_perkawinan'   => Label::whereLabel('status-perkawinan'),
            'kewarganegaraan'     => Label::whereLabel('kewarganegaraan'),
            'golongan_darah'      => Label::whereLabel('golongan-darah'),
            'cacat'               => Label::whereLabel('cacat'),
            'sakit_menahun'       => Label::whereLabel('sakit-menahun'),
            'cara_kb'             => Label::whereLabel('cara-kb'),
        ];
        $option = [];

        foreach($fields as $key => $val)
        {
            $option[$key] = [];

            foreach($val->first()->turunan as $label)
            {
                array_push($option[$key], [
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
     * Submit Action
     */
    public function submit()
    {
        $request = new PendudukStore;

        $data = $this->input;
        $rule = $request->rules($data);
        $attr = $request->attributes();

        $validator = Validator::make($data, $rule, [], $attr);
        $validatedData = $validator->validate();

        $create = Penduduk::create($validatedData);

        if ($create) {
            session()->flash('success', 'Penduduk berhasil ditambahkan.');
        } else {
            session()->flash('failed', 'Penduduk gagal ditambahkan.');
        }
    }
    
    public function render()
    {
        return view('livewire.penduduk.create', [
            'option' => $this->makeOptions(),
        ]);
    }
}
