<?php

namespace Abstraction\Infrastructure\Formatter;

class JsonFormatter
{
    public function decode(string $jsonData): array
    {
        return json_decode($jsonData, true);
    }
}
