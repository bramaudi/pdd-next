<?php

namespace App\Rules\Permission;

use App\Models\Permission\Permission;
use Illuminate\Contracts\Validation\Rule;

class ExistsOnGuardRule implements Rule
{
    protected string $guard;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $guard)
    {
        $this->setGuard($guard);
    }

    protected function setGuard(string $guard): void
    {
        $this->guard = $guard;
    }

    protected function model(): string
    {
        return Permission::class;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */

    protected function find(string $attribute, string $value)
    {
        $filter = [
            $attribute => $value,
           "guard_name" => $this->guard
       ];

       return $this->model()::where($filter);
    }

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
