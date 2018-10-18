<?php

namespace Tests\Implement;

use Implement\App;
use Tests\Functional\BaseTestCase;

class AppTest extends BaseTestCase {

    const DATA_JSON = 'data.json';

    public function testSumPairNumberWhenNumberBeGreaterThatThousands() {
        $sut = new App();

        $this->assertEquals(8511104, $sut->execute());
    }
}
