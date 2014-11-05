<?php

/**
 * (c) Rob Bast <rob.bast@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Alcohol\Tests;

use Alcohol\ISO4217;

class ISO4217Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
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
     * @param string $alpha3
     *
     * @dataProvider invalidAlpha3
     * @expectedException \InvalidArgumentException
     */
    public function testGetInvalidByAlpha3ThrowsInvalidArgumentException($alpha3)
    {
        ISO4217::getByAlpha3($alpha3);
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
     * @param string $numeric
     *
     * @dataProvider invalidNumeric
     * @expectedException \InvalidArgumentException
     */
    public function testGetByInvalidNumericThrowsInvalidArgumentException($numeric)
    {
        ISO4217::getByNumeric($numeric);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testGetByUnknownNumericThrowsRuntimeException()
    {
        ISO4217::getByNumeric('000');
    }

    /**
     * @return array
     */
    public function invalidAlpha3()
    {
        return array(array('ZZ'), array('ZZZZ'));
    }

    /**
     * @return array
     */
    public function invalidNumeric()
    {
        return array(array('00'), array('0000'));
    }
}
