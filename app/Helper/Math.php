<?php

namespace App\Helper;

use DateTime;

trait Math {

    /**
     * Hitung umur dari tanggal lahir
     */
    public static function calcUmur(String $date): String
    {
        $birth = new DateTime($date);
        $today = new DateTime('today');
        return $birth < $today ? $today->diff($birth)->y : null;
    }

}