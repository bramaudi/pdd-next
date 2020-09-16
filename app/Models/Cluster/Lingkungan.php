<?php

namespace App\Models\Cluster;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Staudenmeir\EloquentHasManyDeep\HasManyDeep;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lingkungan extends Model
{
    use HasRelationships, HasFactory;

    protected $table = 'lingkungan';
    protected $fillable = ['nama'];

    public function rw(): HasMany
    {
        return $this->hasMany(Rw::class);
    }

    public function rt(): HasManyThrough
    {
        return $this->hasManyThrough(Rt::class, Rw::class);
    }

    public function penduduk(): HasManyDeep
    {
        return $this->hasManyDeep(Penduduk::class, [Rw::class, Rt::class]);
    }
}
