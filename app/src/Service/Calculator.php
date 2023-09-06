<?php

namespace App\Service;

use App\Enum\CalculatorOperationEnumType;
use App\Model\CalculatorDto;

final class Calculator implements CalculatorInterface
{
    public function calculate(CalculatorDto $calculatorDto): float
    {
        return match ($calculatorDto->operation) {
            CalculatorOperationEnumType::ADDITION => $calculatorDto->firstArgument + $calculatorDto->secondArgument,
            CalculatorOperationEnumType::SUBTRACTION => $calculatorDto->firstArgument - $calculatorDto->secondArgument,
            CalculatorOperationEnumType::MULTIPLICATION => $calculatorDto->firstArgument * $calculatorDto->secondArgument,
            CalculatorOperationEnumType::DIVISION => $calculatorDto->firstArgument / $calculatorDto->secondArgument,
        };
    }
}