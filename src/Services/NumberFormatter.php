<?php


namespace App\Services;


class NumberFormatter
{
    public function changeNumberFormat($number)
    {
        if (999500 <= $number) {
            return strval(number_format(($number/1000000), 2)).'M';
        } elseif (99950 <= $number && $number < 999500) {
            return strval(number_format(($number/1000), 0)).'K';
        } elseif ( 1000 <= $number && $number < 99950) {
            return strval(number_format(($number), 0, '.', ' '));
        } elseif ( 0 <= $number && $number < 1000) {
            return str_replace('.00', '', number_format(($number), 2, '.', ' '));
        }

        if (-999500 >= $number) {
            return strval(number_format(($number/1000000), 2)).'M';
        } elseif (-99950 >= $number && $number > -999500) {
            return strval(number_format(($number/1000), 0)).'K';
        } elseif ( -1000 >= $number && $number > -99950) {
            return strval(number_format(($number), 0, '.', ' '));
        } elseif ( 0 >= $number && $number > -1000) {
            return str_replace('.00', '', number_format(($number), 2, '.', ' '));
        }
        return false;
    }
}
