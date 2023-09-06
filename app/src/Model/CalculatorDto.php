<?php

namespace App\Model;

use App\Enum\CalculatorOperationEnumType;

use App\Validator\ConstraintDivisionByZero;
use Symfony\Component\Validator\Constraints as Assert;

#[ConstraintDivisionByZero]
class CalculatorDto
{
    #[Assert\Type('float')]
    #[Assert\NotBlank]
    public float $firstArgument;

    #[Assert\NotBlank]
    #[Assert\Type(CalculatorOperationEnumType::class)]
    public CalculatorOperationEnumType $operation;

    #[Assert\Type('float')]
    #[Assert\NotBlank]
    public float $secondArgument;

}