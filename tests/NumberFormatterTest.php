<?php

namespace App\Tests;

use App\Services\NumberFormatter;
use PHPUnit\Framework\TestCase;

class NumberFormatterTest extends TestCase
{
    public function providerValidNumberFormats()
    {
        return [
            'milions' => ['2.84M', 2835799],
            'milions2' => ['1.00M', 999500],
            'thousands' => ['535K', 535216],
            'thousands2' => ['100K', 99950],
            'thousands3' => ['27 534', 27533.78],
            'thousands4' => ['999.99', 999.99],
            'thousands5' => ['1 000', 999.9999],
            'hundred' => ['533.10', 533.1],
            'hundred2' => ['66.67', 66.6666],
            'hundred3' => ['12', 12.00],
            'minus' => ['-124K', -123654.89],
        ];
    }
    /**
     * @dataProvider providerValidNumberFormats
     * @param string $expectedNumberFormat
     * @param string $actualNumber
     */
    public function testValidNumberFormats($expectedNumberFormat, $actualNumber)
    {
        $numberFormatter = new NumberFormatter();
        $this->assertEquals($expectedNumberFormat, $numberFormatter->changeNumberFormat($actualNumber));
    }
}
