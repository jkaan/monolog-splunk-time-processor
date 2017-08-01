# Splunk Time Processor

## Install
`$ composer require "jkaan/monolog-splunk-time-processor"`

## Usage
The example highlights using this processor with Monolog.

```php
$monolog->addProcessor(new SplunkTimeProcessor());
```

All records that you send through Monolog will have a `time` key added to record.
This `time` key contains the current date in ISO8601 format with milliseconds accuracy.

## Why?
When logging JSON data to Splunk, by default, it separates log events based on time.
If you don't include a `time` key as the first key multiple log events could possibly be categorised as one row in Splunk.
