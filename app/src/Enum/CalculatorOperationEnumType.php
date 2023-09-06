<?php

declare(strict_types=1);

namespace App\Enum;

enum CalculatorOperationEnumType: string
{
    case ADDITION = '+';
    case SUBTRACTION = '-';
    case MULTIPLICATION = '*';
    case DIVISION = '/';

    public static function getTypes(): array
    {
        return array_reduce(
            self::cases(),
            static fn (array $choices, self $enum) => $choices + [$enum->value => $enum->value],
            [],
        );
    }
}
