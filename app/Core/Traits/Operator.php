<?php

namespace App\Core\Traits;

use App\Core\Exceptions\InvalidOperator;

/**
 * Trait to validate op variable.
 *
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2020, Daryl Peterson
 * @license     https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @since       1.0.0
 */
trait Operator
{
    public static $VALID_OPS = [
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
        if (!in_array($value, self::$VALID_OPS)) {
            throw new InvalidOperator('Invalid operator assignment');
        }
        $this->attributes['op'] = $value;
    }
}
