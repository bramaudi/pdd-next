<?php

namespace App\Models\Indonesia;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model
{
    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
    }

    public function villages(): HasMany
    {
        return $this->hasMany(Village::class);
    }
}
