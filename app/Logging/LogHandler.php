<?php

namespace App\Logging;

use Monolog\Formatter\FormatterInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\LogRecord;

/**
 * Handles Logging.
 *
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2020, Daryl Peterson
 * @license     https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @since       1.0.0
 */
class LogHandler extends StreamHandler
{
    protected $maxFileSize = 200000;

    public function __construct($stream, $level = Level::Debug, bool $bubble = true, ?int $filePermission = null, bool $useLocking = false)
    {
        parent::__construct($stream, $level, $bubble, $filePermission, $useLocking);
    }

    /**
     * {@inheritDoc}
     */
    protected function write(LogRecord $record): void
    {
        global $appDebug;

        $this->checkLogSize();

        $appDebugEnv = env('APP_DEBUG', false);
        $appLevel = env('APP_DEBUG_LEVEL', 100);

        $recLevel = $record['level'];

        if (!env('APP_DEBUG', false)) {
            return;
        }

        if (!isset($appDebug)) {
            $appDebug = $appDebugEnv;
        }

        if ($recLevel < $appLevel) {
            return;
        }

        if (!$appDebug) {
            return;
        }

        parent::write($record);
    }

    /**
     * Get LogFormatter.
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        return new LogFormatter();
    }

    /**
     * Check the log size to make sure it's not too big.
     * Truncate log if needed.
     *
     * @return void
     */
    private function checkLogSize()
    {
        $url = $this->url;
        if (null === $url || '' === $url) {
            return;
        }

        $fs = filesize($url);
        if (!$fs) {
            return;
        }

        if ($fs < $this->maxFileSize) {
            return;
        }

        $fh = fopen($url, 'w');
        if ($fh) {
            fclose($fh);
        }
    }
}
