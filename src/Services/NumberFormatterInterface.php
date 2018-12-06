<?php

namespace App\Services;

interface NumberFormatterInterface
{
    public function changeNumberFormat(float $number): string;
}
