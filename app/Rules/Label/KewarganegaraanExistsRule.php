<?php

namespace App\Rules\Label;

class KewarganegaraanExistsRule extends LabelExistsRule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->setCategory('kewarganegaraan');
    }
}
