<?php

namespace App\Http\Controllers\Dashboard\Surat;

use App\Http\Controllers\Controller;
use App\Models\Surat\Format\Format;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function buat(Format $format)
    {
        return view('pages.dashboard.surat.format.index', compact('format'));
    }
}
