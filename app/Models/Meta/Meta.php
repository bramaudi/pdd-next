<?php

namespace App\Models\Meta;

use Illuminate\Database\Eloquent\Model;
use stdClass;

class Meta extends Model
{
    protected $fillable = ['key', 'description', 'value'];

    public function decode(): stdClass
    {
        return json_decode($this->value);
    }
}
