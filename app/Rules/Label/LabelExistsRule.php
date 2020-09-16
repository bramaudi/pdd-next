<?php

namespace App\Rules\Label;

use App\Models\Label\Label;
use Illuminate\Contracts\Validation\Rule;

class LabelExistsRule implements Rule
{
    protected string $category;

    protected function setCategory(string $category): void
    {
        $this->category = $category;
    }

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $category)
    {
        $this->setCategory($category);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return Label::whereLabel($this->category)->first()->turunan()->where(is_numeric($value) ? 'id':'label', $value)->exists();
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
