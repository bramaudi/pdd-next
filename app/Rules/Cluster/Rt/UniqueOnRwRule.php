<?php

namespace App\Rules\Cluster\Rt;

use App\Models\Cluster\Rt;
use App\Models\Cluster\Rw;

class UniqueOnRwRule extends ExistsOnRwRule
{
    protected Rt $updatable;

    public function __construct(Rw $rw, Rt $updatable = null)
    {
        parent::__construct($rw);

        if(isset($updatable))
        {
            $this->setUpdatable($updatable);
        }
    }

    protected function setUpdatable(Rt $updatable)
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
