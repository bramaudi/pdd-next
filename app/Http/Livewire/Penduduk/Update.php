<?php

namespace App\Http\Livewire\Penduduk;

use App\Models\Kependudukan\Penduduk;
use App\Models\Label\Label;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;

class Update extends Component
{
    public $model;

    public $input = [];

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

    /**
     * Muat nilai $this->input dari db
     */
    public function mount($pendudukId)
    {
        $this->model = Penduduk::findOrFail($pendudukId);

        foreach ($this->input as $inputKey => $inputVal)
        {
            $this->input[$inputKey] = $this->model[$inputKey];
        }
    }

    /**
     * Untuk muat nama label dari id
     * dan membuat daftar opsi
     */
    public function label()
    {
        $fields = [
            'hubungan_keluarga'   => Label::whereLabel('hubungan-keluarga'),
            'jenis_kelamin'       => Label::whereLabel('jenis-kelamin'),
            'agama'               => Label::whereLabel('agama'),
            'status_kependudukan' => Label::whereLabel('status-kependudukan'),
            'pendidikan'          => Label::whereLabel('pendidikan'),
            'pekerjaan'           => Label::whereLabel('pekerjaan'),
            'status_perkawinan'   => Label::whereLabel('status-perkawinan'),
            'golongan_darah'      => Label::whereLabel('golongan-darah'),
            'kewarganegaraan'     => Label::whereLabel('kewarganegaraan'),
        ];

        $option = [];
        $name = [];

        foreach($fields as $inputKey => $label)
        {
            $option[$inputKey] = $label->first()->turunan;
            $name[$inputKey] = Label::find($this->input[$inputKey.'_id'])->label;
        }

        return (object)[
            'option' => $option,
            'name' => $name,
        ];
    }

    /**
     * Submit Action
     */
    public function submit()
    {
        // Todo: validation rules & flash message

        $model = $this->model;

        foreach($this->input as $column => $value)
        {
            $model->$column = $value;
        }

        $model->save();
    }

    /**
     * Render
     */
    public function render()
    {
        return view('livewire.penduduk.update',
        [
            'option' => $this->label()->option,
            'label' => $this->label()->name,
        ]);
    }
}
