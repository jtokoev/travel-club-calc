<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\CalculatorDto;

interface CalculatorInterface
{
    public function calculate(CalculatorDto $calculatorDto): float;
}
