<?php

namespace App\Http\Controllers\Dashboard\Surat;

use App\Http\Controllers\Controller;
use App\Models\Surat\SuratFormat;
// use Illuminate\Http\Request;

class FormatController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.surat.format.index');
    }

    public function create()
    {
        //
    }

    public function properties(SuratFormat $format)
    {
        return $format;
    }
}