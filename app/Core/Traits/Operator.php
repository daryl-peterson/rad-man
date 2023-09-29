<?php

namespace App\Core\Traits;

use App\Core\Exceptions\InvalidOperator;

trait Operator
{
    public const VALID_OPS = [
        ':=',
        '==',
        '+=',
        '!=',
        '>',
        '>=',
        '<',
        '<=',
        '=*',
        '!*',
    ];

    /**
     * Set op field.
     *
     * @throws InvalidOperator
     */
    public function setOpAttribute(string $value): void
    {
        if (!in_array($value, self::VALID_OPS)) {
            throw new InvalidOperator('Invalid operator assignment');
        }
        $this->attributes['op'] = $value;
    }
}
