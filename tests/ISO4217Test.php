<?php

namespace Alcohol\Tests;

use Alcohol\ISO4217;

class ISO4217Test extends \PHPUnit_Framework_TestCase
{
    public $data = array(
        'alpha3' => 'EUR',
        'numeric' => '978',
        'exp' => 2,
        'name' => 'Euro',
        'country' => array(
            "AX",
            "AD",
            "AT",
            "BE",
            "CY",
            "FI",
            "FR",
            "GF",
            "TF",
            "DE",
            "GR",
            "GP",
            "VA",
            "IE",
            "IT",
            "LU",
            "MT",
            "MQ",
            "YT",
            "MC",
            "ME",
            "NL",
            "PT",
            "RE",
            "BL",
            "MF",
            "PM",
            "SM",
            "SK",
            "SI",
            "ES",
            "ZW"
        )
    );

    public function testGetByAlpha3ReturnsCorrectData()
    {
        $this->assertEquals(
            $this->data,
            ISO4217::getByAlpha3($this->data['alpha3'])
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetInvalidByAlpha3ThrowsInvalidArgumentException()
    {
        ISO4217::getByAlpha3('ZZ');
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testGetUnknownByAlpha3ThrowsRuntimeException()
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
     * @expectedException \InvalidArgumentException
     */
    public function testGetByInvalidNumericThrowsInvalidArgumentException()
    {
        ISO4217::getByNumeric('00');
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testGetByUnknownNumericThrowsRuntimeException()
    {
        ISO4217::getByNumeric('000');
    }
}
