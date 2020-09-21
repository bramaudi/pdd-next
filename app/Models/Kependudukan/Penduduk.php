<?php

namespace App\Models\Kependudukan;

use App\Models\Label\Label;
use App\Traits\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penduduk extends Model
{
    use HasFactory, Helper;

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

    public function getUmurAttribute()
    {
        return $this->calcUmur($this->tanggal_lahir);
    }

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

    public function pendidikan(): BelongsTo
    {
        return $this->belongsTo(Label::class);
    }

    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class);
    }

}
