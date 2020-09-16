<?php

namespace App\Rules\Label;

class JenisKelaminExistsRule extends LabelExistsRule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->setCategory('jenis-kelamin');
    }
}
