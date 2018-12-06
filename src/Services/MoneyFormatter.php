<?php

namespace App\Services;

class MoneyFormatter implements MoneyFormatterInterface
{
    private $numberFormatter;

    /**
     * MoneyFormatter constructor.
     * @param $numberFormatter
     */
    public function __construct(NumberFormatter $numberFormatter)
    {
        $this->numberFormatter = $numberFormatter;
    }

    public function formatEur(float $number): string
    {
        return $this->numberFormatter->changeNumberFormat($number).' €';
    }

    public function formatUsd(float $number): string
    {
        return '$'.$this->numberFormatter->changeNumberFormat($number);
    }
}
