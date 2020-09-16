<?php

namespace App\Rules\Cluster\Rw;

use App\Models\Cluster\Lingkungan;
use App\Models\Cluster\Rw;

class UniqueOnLingkunganRule extends ExistsOnLingkunganRule
{
    protected Rw $updatable;

    public function __construct(Lingkungan $lingkungan, Rw $updatable = null)
    {
        parent::__construct($lingkungan);

        if(isset($updatable))
        {
            $this->setUpdatable($updatable);
        }
    }

    protected function setUpdatable(Rw $updatable)
    {
        $this->updatable = $updatable;
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
        return !parent::passes($attribute, $value) || (isset($this->updatable) && $this->find($attribute, $value)->first()->id === $this->updatable->id);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.unique');
    }
}
