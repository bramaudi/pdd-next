<?php

namespace App\Models\Kependudukan;

use App\Models\Label\Label;
use App\Helper\Math;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduk';

    protected $guarded = ['id', 'updated_at', 'created_at'];

    public function getUmurAttribute()
    {
        return Math::calcUmur($this->tanggal_lahir);
    }

    public function rt(): BelongsTo
    {
        return $this->belongsTo(Rt::class);
    }

    public function jenisKelamin(): BelongsTo
    {
        return $this->belongsTo(Label::class);
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

    public function hubunganKeluarga(): BelongsTo
    {
        return $this->belongsTo(Label::class);
    }

    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class);
    }

}
