<?php
declare(strict_types=1);

namespace Jk\Tests\Processor;

use Jk\Processor\SplunkTimeProcessor;
use PHPUnit\Framework\TestCase;

class SplunkTimeProcessorTest extends TestCase
{
    public function testClassExists()
    {
        $this->assertTrue(class_exists(SplunkTimeProcessor::class));
    }

    public function testTimeIsAddedToLogRecord()
    {
        $logRecord = ['message' => 'Test message'];
        $processor = new SplunkTimeProcessor();
        $timeLogRecord = $processor($logRecord);

        $this->assertArrayHasKey('time', $timeLogRecord);
    }

    public function testTimeIsAddedToFrontOfArray()
    {
        $logRecord = ['message' => 'Test message'];
        $processor = new SplunkTimeProcessor();
        $timeLogRecord = $processor($logRecord);

        $this->assertEquals('time', current(array_keys($timeLogRecord)));
    }
}
