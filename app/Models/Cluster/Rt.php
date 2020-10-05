<?php

namespace App\Models\Cluster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rt extends Model
{
    use HasFactory;
    
    protected $fillable = ['rw_id', 'nomor', 'kepala_id'];

    protected $table = "lingkungan_rt";

    public function rw(): BelongsTo
    {
        return $this->belongsTo(Rw::class);
    }

    public function penduduk(): HasMany
    {
        return $this->hasMany(Penduduk::class);
    }

    public function kepala() : BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }
}
