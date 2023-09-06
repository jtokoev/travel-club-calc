<?php

namespace App\Tests\Functional\Calculator\Error;

use App\Enum\CalculatorOperationEnumType;
use App\Tests\Functional\BaseFunctionalTest;
use Symfony\Component\HttpFoundation\Response;

final class DivisionByZeroTest extends BaseFunctionalTest
{
    protected static function getOperation(): CalculatorOperationEnumType
    {
        return CalculatorOperationEnumType::DIVISION;
    }

    protected function generateSecondArgument(): void
    {
        $this->secondArgument = 0.0;
    }

    public function test(): void
    {
        $form = $this->buildForm();

        $this->client->submit($form);

        $this->assertResponseStatusCodeSame(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}