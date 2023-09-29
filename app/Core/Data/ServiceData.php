<?php

namespace App\Core\Data;

use App\Models\ServiceType;

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
class ServiceData
{
    public static array $pppoe = [
        [
            'attribute' => 'Framed-Protocol',
            'op' => ':=',
            'value' => 'PPP',
        ],
        [
            'attribute' => 'Idle-Timeout',
            'op' => ':=',
            'value' => '0',
        ],
        [
            'attribute' => 'Session-Timeout',
            'op' => ':=',
            'value' => '0',
        ],
    ];

    public static function get()
    {
        $typeFTH = ServiceType::getByName('FTH');
        $typeCisco = ServiceType::getByName('Cisco Priv15');

        return [
            [
                'name' => 'FTH - Gold Package',
                'type_id' => $typeFTH,
                'def' => array_merge(self::$pppoe,
                    [
                        [
                            'attribute' => 'Cisco-AVPair',
                            'op' => ':=',
                            'value' => 'ip:sub-policy-out=100mb-down',
                        ],
                        [
                            'attribute' => 'Cisco-AVPair',
                            'op' => ':=',
                            'value' => 'ip:sub-policy-in=100mb-up',
                        ],
                ]),
            ],
            [
                'name' => 'FTH - Silver Package',
                'type_id' => $typeFTH,
                'def' => array_merge(self::$pppoe,
                    [
                        [
                            'attribute' => 'Cisco-AVPair',
                            'op' => ':=',
                            'value' => 'ip:sub-policy-out=50mb-down',
                        ],
                        [
                            'attribute' => 'Cisco-AVPair',
                            'op' => ':=',
                            'value' => 'ip:sub-policy-in=50mb-up',
                        ],
                    ]),
            ],
            [
                'name' => 'FTH - Bronze Package',
                'type_id' => $typeFTH,
                'def' => array_merge(self::$pppoe,
                    [
                        [
                            'attribute' => 'Cisco-AVPair',
                            'op' => ':=',
                            'value' => 'ip:sub-policy-out=25mb-down',
                        ],
                        [
                            'attribute' => 'Cisco-AVPair',
                            'op' => ':=',
                            'value' => 'ip:sub-policy-in=25mb-up',
                        ],
                    ]),
            ],
            [
                'name' => 'Cisco Priv15',
                'type_id' => $typeCisco,
                'def' => [
                            [
                                'attribute' => 'Service-Type',
                                'op' => ':=',
                                'value' => 'NAS-Prompt-User',
                            ],
                            [
                                'attribute' => 'Cisco-AVPair',
                                'op' => ':=',
                                'value' => 'shell:priv-lvl=15',
                            ],
                        ],
            ],
            [
                'name' => 'FTH - Delete Me',
                'type_id' => $typeFTH,
            ],
        ];
    }
}
