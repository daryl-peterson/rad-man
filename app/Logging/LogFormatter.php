<?php

namespace App\Logging;

use Monolog\Formatter\NormalizerFormatter;
use Monolog\LogRecord;

/**
 * Custom Log Formatter.
 *
 * @category
 *
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2020, Daryl Peterson
 * @license     https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @since       1.0.0
 */
class LogFormatter extends NormalizerFormatter
{
    public function format(LogRecord $record)
    {
        $context = $this->fixContext($record['context']);
        $context = json_decode(json_encode($context, JSON_PRETTY_PRINT), true);

        $context = json_encode($context, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        $context = str_replace('\u0000*', '', $context);
        $context = str_replace('\u0000', '', $context);

        $date = date('Y-m-d H:i:s');
        $now = \DateTime::createFromFormat('U.u', microtime(true));

        if ($now) {
            $date = $now->format('Y-m-d H:i:s.u');
        }

        $padLen = 10;
        $pad_str = str_repeat(' ', $padLen);

        $obj = $this->getTraceInfo();

        $msg = "\n";
        $msg .= str_repeat('-', 80)."\n";
        $msg .= substr('DATE'.$pad_str, 0, $padLen).' : '.$date."\n";
        $msg .= substr('LEVEL'.$pad_str, 0, $padLen).' : '.$record->level->getName()."\n";
        $msg .= substr('CLASS'.$pad_str, 0, $padLen).' : '.$obj->class."\n";
        $msg .= substr('FUNCTION'.$pad_str, 0, $padLen).' : '.$obj->function."\n";
        $msg .= substr('LINE'.$pad_str, 0, $padLen).' : '.$obj->line."\n";
        $msg .= "\n";
        $msg .= "MESSAGE\n";
        $msg .= $record['message']."\n\n";

        if ('[]' !== $context) {
            $msg .= "CONTEXT\n";
            $msg .= $context;
        }

        return $msg;
    }

    private function getTraceInfo()
    {
        $obj = new \stdClass();
        $obj->function = '';
        $obj->line = '';
        $obj->class = '';

        // $class = 'none';

        // get the trace
        $trace = debug_backtrace();
        // dd($trace);

        if (isset($trace[8]['line'])) {
            $obj->line = $trace[8]['line'];
        }

        if (isset($trace[9]['class'])) {
            $obj->class = $trace[9]['class'];
        }

        if (isset($trace[9]['function'])) {
            $obj->function = $trace[9]['function'];
        }

        return $obj;
    }

    private function fixContext($context)
    {
        foreach ($context as $key => $value) {
            $type = gettype($value);
            $class = null;
            if ('object' === $type) {
                $class = get_class($value);
                if ('stdClass' !== $class) {
                    $context[$key] = (array) $value;
                }
            }
        }

        return $context;
    }

    private function object_to_array($obj)
    {
        if (is_object($obj)) {
            $obj = (array) $obj;
        }
        if (is_array($obj)) {
            $new = [];
            foreach ($obj as $key => $val) {
                $new[$key] = $this->object_to_array($val);
            }
        } else {
            $new = $obj;
        }

        return $new;
    }
}
