<?php

namespace App\Models\Kependudukan;

use App\Models\Kependudukan\Penduduk;
use App\Models\Label\Label;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Keluarga extends Model
{
    use HasFactory;

    protected $table = 'keluarga';

    protected $fillable = ['no_kk', 'rt_id', 'tanggal_cetak'];

    public function kepala()
    {
        $kepalaKeluarga = Label::whereLabel('Kepala Keluarga')->first()->id;
        return $this->anggota
                    ->where('hubungan_keluarga_id', $kepalaKeluarga)
                    ->first();
    }

    public function anggota(): HasMany
    {
        return $this->hasMany(Penduduk::class);
    }
}
