<?php

namespace Abstraction\Infrastructure\Http;

use Abstraction\Application\SumPairNumberGreaterThatThousandsUseCase;

class SumPairNumberController
{
    /**
     * @var SumPairNumberGreaterThatThousandsUseCase
     */
    private $sumPairNumberGreaterThatThousandsUseCase;

    public function __construct(SumPairNumberGreaterThatThousandsUseCase $sumPairNumberGreaterThatThousandsUseCase)
    {
        $this->sumPairNumberGreaterThatThousandsUseCase = $sumPairNumberGreaterThatThousandsUseCase;
    }

    public function index(): int
    {
        return $this->sumPairNumberGreaterThatThousandsUseCase->execute();
    }
}
