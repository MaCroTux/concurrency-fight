<?php

namespace Abstraction\Domain;

interface Storage
{
    public function all(): Collection;
}
