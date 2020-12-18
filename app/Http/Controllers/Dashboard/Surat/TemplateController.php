<?php

namespace App\Http\Controllers\Dashboard\Surat;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
// use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index(): View
    {
        return view('pages.dashboard.surat.template');
    }
}
