<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class ConstraintDivisionByZero extends Constraint
{
    public function getTargets(): string
    {
        return self::CLASS_CONSTRAINT;
    }

    public function getMessage(): string
    {
        return 'Вы не можете делить на 0';
    }
}