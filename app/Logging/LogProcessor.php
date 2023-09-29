<?php

namespace App\Logging;

use Monolog\LogRecord;

/**
 * Log Proccessing
 * This class extend the default fields for the log entry with some extra information.
 *
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2020, Daryl Peterson
 * @license     https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @since       1.0.0
 */
class LogProcessor
{
    public function __invoke(LogRecord $record): LogRecord
    {
        return $record;
    }
}
