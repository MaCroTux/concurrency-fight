<?php

namespace Abstraction\Infrastructure;

use Abstraction\Domain\Collection;
use Abstraction\Domain\Storage;
use Abstraction\Infrastructure\Formatter\JsonFormatter;

class FileStorage implements Storage
{
    /** @var string */
    private $filePath;
    /** @var JsonFormatter */
    private $formatter;

    public function __construct(JsonFormatter $formatter, $filePath)
    {
        $this->filePath  = $filePath;
        $this->formatter = $formatter;
    }

    public function all(): Collection
    {
        return new Collection(
            $this->formatter->decode(
                file_get_contents($this->filePath)
            )
        );
    }
}
