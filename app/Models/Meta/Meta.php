<?php

namespace App\Models\Meta;

use Illuminate\Database\Eloquent\Model;
use stdClass;

class Meta extends Model
{
    protected $fillable = ['key', 'description', 'value'];

    public function decode(bool $array_mode = false): stdClass
    {
        return json_decode($this->value, $array_mode);
    }
}
