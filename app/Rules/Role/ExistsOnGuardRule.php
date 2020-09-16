<?php

namespace App\Rules\Role;

use App\Models\Permission\Role;
use App\Rules\Permission\ExistsOnGuardRule as PermissionExistsOnGuardRule;

class ExistsOnGuardRule extends PermissionExistsOnGuardRule
{
    protected function model(): string
    {
        return Role::class;
    }
}
