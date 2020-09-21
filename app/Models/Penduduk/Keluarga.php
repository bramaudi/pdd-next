<?php

namespace App\Models\Penduduk;

use App\Models\Cluster\Penduduk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Keluarga extends Model
{
    use HasFactory;

    protected $table = 'keluarga';

    public function kepala(): HasOne
    {
        return $this->anggota->whereNotNull('is_kepala');
    }

    public function anggota(): HasMany
    {
        return $this->hasMany(Penduduk::class);
    }
}
