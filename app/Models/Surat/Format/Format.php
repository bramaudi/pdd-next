<?php

namespace App\Models\Surat\Format;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    use HasFactory;

    protected $table = "surat_format";

    protected $fillable = ["name", "prefix", "active", "pinned"];
}
