<?php

namespace App\Validator;

use App\Enum\CalculatorOperationEnumType;
use App\Model\CalculatorDto;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ConstraintDivisionByZeroValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof ConstraintDivisionByZero) {
            return;
        }

        if (!$value instanceof CalculatorDto) {
            return;
        }

        if (CalculatorOperationEnumType::DIVISION === $value->operation && 0.0 === $value->secondArgument) {
            $this->context->buildViolation($constraint->getMessage())
                ->atPath('secondArgument')
                ->addViolation();
        }
    }
}