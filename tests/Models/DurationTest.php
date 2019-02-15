<?php

namespace Poing\Eviternity\Tests\Models;

use Orchestra\Testbench\TestCase;
use Poing\Eviternity\Models\Duration as Duration;

class DurationTest extends TestCase
{

    public function testBasic()
    {
        $this->assertTrue(Duration::probe());
    }

}
