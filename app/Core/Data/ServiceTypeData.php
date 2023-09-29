<?php

namespace App\Core\Data;

/**
 * Class description.
 *
 * @category
 *
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2020, Daryl Peterson
 * @license     https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @since       1.0.0
 */
class ServiceTypeData
{
    public static function get()
    {
        return [
            [
                'name' => 'FTH',
            ],
            [
                'name' => 'DSL',
            ],
            [
                'name' => 'Wireless',
            ],
            [
                'name' => 'PPPOE',
            ],
            [
                'name' => 'Cisco Priv15',
            ],
        ];
    }
}
