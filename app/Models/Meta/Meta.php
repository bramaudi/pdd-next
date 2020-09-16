<?php

namespace App\Models\Meta;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $fillable = ['key', 'description', 'value'];
}
