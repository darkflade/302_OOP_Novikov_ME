<?php

declare(strict_types=1);

namespace App;

class Truncater
{
    public static array $defaultOptions = [
        'length' => 50,
        'separator' => '...'
    ];

    private array $options;

    public function __construct(array $options = [])
    {
        $this->options = array_merge(self::$defaultOptions, $options);
    }

    public function truncate(string $text, array $options = []): string
    {
        $currentOptions = array_merge($this->options, $options);
        $length = $currentOptions['length'];
        $separator = $currentOptions['separator'];

        if ($length <= 0) {
            return '';
        }

        if (mb_strlen($text) <= $length) {
            return $text;
        }

        $truncated = mb_substr($text, 0, $length);
        return $truncated . $separator;
    }
}
