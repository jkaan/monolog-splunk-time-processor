<?php
declare(strict_types=1);

namespace Jk\Processor;

/**
 * This processor adds a time key with a ISO8601 date in the front of the record
 *
 * This allows Splunk to use it to index JSON events/logs coming in
 */
class SplunkTimeProcessor
{
    public function __invoke(array $record): array
    {
        // Date format is ISO8601 with added milliseconds
        $dateFormat = 'Y-m-d\TH:i:s.vP';

        return ['time' => (new \DateTimeImmutable)->format($dateFormat)] + $record;
    }
}
