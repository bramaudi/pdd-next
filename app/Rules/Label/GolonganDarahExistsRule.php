<?php

namespace App\Rules\Label;

class GolonganDarahExistsRule extends LabelExistsRule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->setCategory('golongan-darah');
    }
}
