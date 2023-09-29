<?php

namespace App\Logging;

use Monolog\Logger;

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
class LogJob
{
    public function __invoke(): Logger
    {
        $path = storage_path('logs/laravel.log');
        $logger = new Logger('custom');
        $handler = new LogHandler($path);
        $processor = new LogProcessor();
        $logger->pushHandler($handler);
        $logger->pushProcessor($processor);

        return $logger;
    }
}
