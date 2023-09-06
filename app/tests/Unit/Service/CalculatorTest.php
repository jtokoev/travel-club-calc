<?php

namespace App\Tests\Unit\Service;

use App\Enum\CalculatorOperationEnumType;
use App\Model\CalculatorDto;
use App\Service\Calculator;
use PHPUnit\Framework\TestCase;

final class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    /**
     * @dataProvider calculatorProvider
     */
    public function testCalculate(CalculatorOperationEnumType $calculatorOperationEnumType): void
    {
        $firstArgument = rand(1, 100);
        $secondArgument = rand(1, 100);

        $dto = new CalculatorDto();
        $dto->firstArgument = $firstArgument;
        $dto->secondArgument = $secondArgument;
        $dto->operation = $calculatorOperationEnumType;


        $this->assertEquals(eval(sprintf('return %d %s %d;', $firstArgument, $calculatorOperationEnumType->value, $secondArgument)), $this->calculator->calculate($dto));
    }

    private function calculatorProvider(): array
    {
        return [
            [CalculatorOperationEnumType::ADDITION],
            [CalculatorOperationEnumType::MULTIPLICATION],
            [CalculatorOperationEnumType::SUBTRACTION],
            [CalculatorOperationEnumType::DIVISION],
        ];
    }
}