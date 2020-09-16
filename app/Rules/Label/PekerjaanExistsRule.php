<?php

namespace App\Rules\Label;

class PekerjaanExistsRule extends LabelExistsRule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->setCategory('pekerjaan');
    }
}
