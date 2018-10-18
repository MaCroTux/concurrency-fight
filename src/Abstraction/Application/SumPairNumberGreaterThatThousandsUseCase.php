<?php

namespace Abstraction\Application;

use Abstraction\Domain\Storage;
use Abstraction\Domain\SumPairNumberGreteThatThousandsService;

class SumPairNumberGreaterThatThousandsUseCase
{
    /** @var Storage */
    private $storage;
    /** @var SumPairNumberGreteThatThousandsService */
    private $sumPairNumberGreteThatThousands;

    public function __construct(
        Storage $storage,
        SumPairNumberGreteThatThousandsService $sumPairNumberGreteThatThousands
    ) {
        $this->storage                          = $storage;
        $this->sumPairNumberGreteThatThousands  = $sumPairNumberGreteThatThousands;
    }

    public function execute(): int
    {
        return $this->sumPairNumberGreteThatThousands->execute(
            $this->storage->all()
        );
    }
}
