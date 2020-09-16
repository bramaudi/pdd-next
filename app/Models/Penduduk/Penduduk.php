<?php

namespace App\Models\Penduduk;

use App\Models\Label\Label;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penduduk extends Model
{
    protected $table = 'penduduk';

    protected $fillable = [
        "nik",
        "rt_id",
        "agama_id",
        "jenis_kelamin_id",
        "golongan_darah_id",
        "kewarganegaraan_id",
        "status_perkawinan_id",
        "pekerjaan_id",
        "ponsel",
        "nama",
        "tempat_lahir",
        "alamat",
        "tanggal_lahir",
        'foto_id'
    ];

    public function rt(): BelongsTo
    {
        return $this->belongsTo(Rt::class);
    }

    public function statusPerkawinan(): BelongsTo
    {
        return $this->belongsTo(Label::class);
    }

    public function pekerjaan(): BelongsTo
    {
        return $this->belongsTo(Label::class);
    }

    public function kewarganegaraan(): BelongsTo
    {
        return $this->belongsTo(Label::class);
    }
}
