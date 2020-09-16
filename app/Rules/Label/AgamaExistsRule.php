<?php

namespace App\Rules\Label;

class AgamaExistsRule extends LabelExistsRule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->setCategory('agama');
    }
}
