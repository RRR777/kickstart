<?php

namespace App\Services;

interface MoneyFormatterInterface
{
    public function formatEur(float $number): string;

    public function formatUsd(float $number): string;
}
