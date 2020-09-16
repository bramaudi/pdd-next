<?php

namespace App\Rules\Cluster\Rt;

use App\Models\Cluster\Rw;
use Illuminate\Contracts\Validation\Rule;

class ExistsOnRwRule implements Rule
{
    protected Rw $rw;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Rw $rw)
    {
        $this->setRw($rw);
    }

    protected function setRw(Rw $rw): void
    {
        $this->rw = $rw;
    }

    protected function find(string $attribute, string $value)
    {
       return $this->rw->rt()->where($attribute, $value);
    }
}
