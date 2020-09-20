<?php

namespace App\Models\Penduduk;

use App\Models\Penduduk\Penduduk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Keluarga extends Model
{
    use HasFactory;

    protected $table = 'keluarga';

    public function anggota(): HasMany
    {
        return $this->hasMany(Penduduk::class);
    }
}
