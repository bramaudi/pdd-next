<?php

namespace App\Models\Label;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Label extends Model
{
    protected $table = 'label';

    protected $fillable = ['label'];

    public function turunan(): HasMany
    {
        return $this->hasMany(static::class, 'induk_id');
    }

    public function induk(): BelongsTo
    {
        return $this->belongsTo(static::class);
    }
}
