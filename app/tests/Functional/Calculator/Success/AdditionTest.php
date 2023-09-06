<?php

namespace App\Tests\Functional\Calculator\Success;

use App\Enum\CalculatorOperationEnumType;
use App\Tests\Functional\BaseFunctionalTest;
use App\Tests\Functional\Calculator\Success\Base\BaseSuccess;
use Symfony\Component\HttpFoundation\Request;

final class AdditionTest extends BaseSuccess
{
    protected static function getOperation(): CalculatorOperationEnumType
    {
        return CalculatorOperationEnumType::ADDITION;
    }

    protected function calculate(): int|float
    {
        return round($this->firstArgument+$this->secondArgument,3);
    }
}