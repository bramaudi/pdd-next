<?php

namespace App\Http\Controllers\Dashboard\Surat;

use App\Http\Controllers\Controller;
use App\Models\Surat\SuratFormat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function buat(SuratFormat $format)
    {
        return view('pages.dashboard.surat.format.index', compact('format'));
    }
}
