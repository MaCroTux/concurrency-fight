<?php

namespace Tests\Abtract\Application;

use Abstraction\Application\SumPairNumberGreaterThatThousandsUseCase;
use Abstraction\Domain\SumPairNumberGreteThatThousandsService;
use Abstraction\Infrastructure\FileStorage;
use Abstraction\Infrastructure\Formatter\JsonFormatter;
use Tests\Functional\BaseTestCase;

class SumPairNumberGreaterThatThousandsTest extends BaseTestCase
{
    const DATA_JSON = 'data.json';

    public function testSumPairNumberWhenNumberBeGreaterThatThousands(): void
    {
        $formatter                       = new JsonFormatter();
        $storage                         = new FileStorage($formatter, self::DATA_JSON);
        $sumPairNumberGreteThatThousands = new SumPairNumberGreteThatThousandsService();

        $sut = new SumPairNumberGreaterThatThousandsUseCase($storage, $sumPairNumberGreteThatThousands);

        $this->assertEquals(8511104, $sut->execute());
    }
}
