<?php

namespace App\Rules\Role;

use App\Models\Permission\Role;
use App\Rules\Permission\UniqueOnGuardRule as PermissionUniqueOnGuardRule;

class UniqueOnGuardRule extends PermissionUniqueOnGuardRule
{
    protected function model(): string
    {
        return Role::class;
    }
}
