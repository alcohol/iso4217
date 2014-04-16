<?php

namespace Alcohol\Tests;

use Alcohol\ISO4217;

class ISO4217Test extends \PHPUnit_Framework_TestCase
{
    public $data = array(
        'alpha3' => 'EUR',
        'numeric' => '978',
        'exp' => 2,
        'name' => 'Euro'
    );

    public function testGetByAlpha3ReturnsCorrectData()
    {
        $this->assertEquals(
            $this->data,
            ISO4217::getByAlpha3($this->data['alpha3'])
        );
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testGetByAlpha3ThrowsException()
    {
        ISO4217::getByAlpha3('ZZZ');
    }

    public function testGetByNumericReturnsCorrectData()
    {
        $this->assertEquals(
            $this->data,
            ISO4217::getByNumeric($this->data['numeric'])
        );
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testGetByNumericThrowsException()
    {
        ISO4217::getByNumeric('000');
    }
}
