<?php

namespace App\Service;

use App\Model\CalculatorDto;

interface CalculatorInterface
{
    public function calculate(CalculatorDto $calculatorDto): float;
}