<?php

namespace Poing\Eviternity\Tests\Models;

use Orchestra\Testbench\TestCase;
use Poing\Eviternity\Models\Everlasting;

class EverlastingTest extends TestCase
{

    public function testBasic()
    {
        $this->assertTrue(Everlasting::probe());
    }

}
