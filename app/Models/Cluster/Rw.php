<?php

namespace App\Models\Cluster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Rw extends Model
{
    use HasFactory;
    
    protected $fillable = ['nomor'];

    protected $table = 'lingkungan_rw';

    public function lingkungan(): BelongsTo
    {
        return $this->belongsTo(Lingkungan::class);
    }

    public function rt(): HasMany
    {
        return $this->hasMany(Rt::class);
    }

    public function penduduk(): HasManyThrough
    {
        return $this->hasManyThrough(Penduduk::class, Rt::class);
    }
}
