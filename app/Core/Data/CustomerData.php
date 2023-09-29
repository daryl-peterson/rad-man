<?php

namespace App\Core\Data;

use App\Models\ServiceType;

/**
 * Class description.
 *
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2020, Daryl Peterson
 * @license     https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @since       1.0.0
 */
class CustomerData
{
    public static function get(): array
    {
        $typeId = ServiceType::getByName('FTH');

        return [
            [
                'firstname' => 'cris p.',
                'lastname' => 'bacon',
                'username' => 'jacrispy',
                'password' => 'B@c0nAtor',
                'svc_type' => $typeId,
                'svc_id' => 1,
            ],
            [
                'firstname' => 'anita',
                'lastname' => 'bathe',
                'username' => 'bubblebath',
                'password' => 'S0@py@123',
                'svc_type' => $typeId,
                'svc_id' => 2,
            ],
            [
                'firstname' => 'barry',
                'lastname' => 'cade',
                'username' => 'bcade',
                'password' => 'St0pBlockingM3',
                'svc_type' => $typeId,
                'svc_id' => 3,
            ],
            [
                'firstname' => 'jerry',
                'lastname' => 'atrick',
                'username' => 'jatrick',
                'password' => 'tester123',
                'svc_type' => $typeId,
                'svc_id' => 3,
            ],
            [
                'firstname' => 'paige',
                'lastname' => 'turner',
                'username' => 'pturner',
                'password' => 'imaT3stThis!',
                'svc_type' => $typeId,
                'svc_id' => 3,
            ],
        ];
    }
}
