<?php

namespace App\Services\Tests;

use App\Services\MoneyFormatter;
use App\Services\NumberFormatter;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MoneyFormatterTest extends TestCase
{
    /** @var NumberFormatter */
    private $numberFormatter = null;

    public function setUp()
    {
        /** @var NumberFormatter|MockObject $numberFormatter */
        $this->numberFormatter = $this->createMock(NumberFormatter::class);
        $this->numberFormatter->expects($this->once())
            ->method('changeNumberFormat')
            ->willReturn('2.84M');
    }

    public function testNumberToMoneyFormatEur()
    {
        $this->numberFormatter = new MoneyFormatter($this->numberFormatter);
        $this->assertEquals('2.84M €', $this->numberFormatter->formatEur(2835779));
    }

    public function testNumberToMoneyFormatUsd()
    {
        $this->numberFormatter = new MoneyFormatter($this->numberFormatter);
        $this->assertEquals('$2.84M', $this->numberFormatter->formatUsd(2835779));
    }
}
