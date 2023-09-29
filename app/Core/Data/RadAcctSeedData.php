<?php

namespace App\Core\Data;

/**
 * RadAcct seed data.
 *
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2020, Daryl Peterson
 * @license     https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @since       1.0.0
 */
class RadAcctSeedData
{
    public static function get(): array
    {
        $data = CustomerData::get();

        foreach ($data as $item) {
            $return[] = $item['username'];
        }

        return $return;
    }
}
