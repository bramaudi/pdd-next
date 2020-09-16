<?php

namespace App\Rules\Permission;

use Illuminate\Database\Eloquent\Model;

class UniqueOnGuardRule extends ExistsOnGuardRule
{
    protected Model $updatable;

    public function __construct(string $guard, Model $updatable = null)
    {
        parent::__construct($guard);

        if(isset($updatable))
        {
            $this->setUpdatable($updatable);
        }
    }

    protected function setUpdatable(Model $updatable)
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
