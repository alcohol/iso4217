<?php

namespace Alcohol;

use PHPUnit\Framework\TestCase;

class ISO4217FactoryTest extends TestCase
{
    /**
     * @testdox Can create ISO4217.
     */
    public function testCanCreateISO4217()
    {
        $iso4217 = ISO4217Factory::create();
        $this->assertInstanceOf('Alcohol\ISO4217', $iso4217);
    }
}
