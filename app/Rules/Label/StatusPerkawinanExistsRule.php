<?php

namespace App\Rules\Label;

class StatusPerkawinanExistsRule extends LabelExistsRule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->setCategory('status-perkawinan');
    }
}
