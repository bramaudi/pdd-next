<?php

namespace App\Models\Kependudukan;

use App\Models\Kependudukan\Penduduk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Keluarga extends Model
{
    use HasFactory;

    protected $table = 'keluarga';

    public function kepala()
    {
        return $this->anggota->whereNotNull('is_kepala')->first();
    }

    public function anggota(): HasMany
    {
        return $this->hasMany(Penduduk::class);
    }
}
