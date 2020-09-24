<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class Permission extends Controller
{
    public function index($roleId)
    {
        return view('pages.dashboard.sistem.permission', [
            'role' => Role::find($roleId)
        ]);
    }
}
