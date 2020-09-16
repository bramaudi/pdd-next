<?php

namespace App\Rules\Cluster\Rw;

use App\Models\Cluster\Lingkungan;
use Illuminate\Contracts\Validation\Rule;

class ExistsOnLingkunganRule implements Rule
{
    protected Lingkungan $lingkungan;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Lingkungan $lingkungan)
    {
        $this->setLingkungan($lingkungan);
    }

    protected function setLingkungan(Lingkungan $lingkungan): void
    {
        $this->lingkungan = $lingkungan;
    }

    protected function find(string $attribute, string $value)
    {
       return $this->lingkungan->rw()->where($attribute, $value);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */

     public function passes($attribute, $value)
    {
        return $this->find($attribute, $value)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.exists');
    }
}
