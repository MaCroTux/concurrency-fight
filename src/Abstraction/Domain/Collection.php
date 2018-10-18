<?php

namespace Abstraction\Domain;

use Slim\Collection as SlimCollection;

class Collection extends SlimCollection
{
    public function filter(callable $fn): Collection
    {
        return new Collection(array_filter($this->data, $fn));
    }

    public function sumInt(): int
    {
        return array_sum($this->data);
    }
}
