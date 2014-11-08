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
     * @test
     * @param string $alpha3
     * @dataProvider invalidAlpha3Provider
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp /^Not a valid alpha3: .*$/
     */
    public function getByAlpha3_throws_InvalidArgumentException_for_invalid_alpha3($alpha3)
    {
        $iso4217 = new ISO4217;
        $iso4217->getByAlpha3($alpha3);
    }

    /**
     * @test
     * @expectedException \RuntimeException
     * @expectedExceptionMessage ISO 4217 does not contain: ZZZ
     */
    public function getByAlpha3_throws_RuntimeException_for_unknown_alpha3()
    {
        $iso4217 = new ISO4217;
        $iso4217->getByAlpha3('ZZZ');
    }

    /**
     * @test
     * @dataProvider alpha3Provider
     * @param string $alpha3
     * @param array $expected
     */
    public function getByAlpha3_returns_expected_data($alpha3, array $expected)
    {
        $iso4217 = new ISO4217;
        $this->assertEquals($expected, $iso4217->getByAlpha3($alpha3));
    }

    /**
     * @test
     * @param string $numeric
     * @dataProvider invalidNumericProvider
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp /^Not a valid numeric: .*$/
     */
    public function getByNumeric_throws_InvalidArgumentException_for_invalid_numeric($numeric)
    {
        $iso4217 = new ISO4217;
        $iso4217->getByNumeric($numeric);
    }

    /**
     * @test
     * @expectedException \RuntimeException
     * @expectedExceptionMessage ISO 4217 does not contain: 000
     */
    public function getByNumeric_throws_RuntimeException_for_unknown_numeric()
    {
        $iso4217 = new ISO4217;
        $iso4217->getByNumeric('000');
    }

    /**
     * @test
     * @dataProvider numericProvider
     * @param string $numeric
     * @param array $expected
     */
    public function getByNumeric_returns_expected_data($numeric, $expected)
    {
        $iso4217 = new ISO4217;
        $this->assertEquals($expected, $iso4217->getByNumeric($numeric));
    }

    /**
     * @test
     */
    public function getAll_returns_array_with_X_elements()
    {
        $iso4217 = new ISO4217;
        $this->assertInternalType('array', $iso4217->getAll());
        $this->assertCount(157, $iso4217->getAll());
    }

    /**
     * @return array
     */
    public function invalidAlpha3Provider()
    {
        return array(array('ZZ'), array('ZZZZ'), array(12), array(1234));
    }

    /**
     * @return array
     */
    public function alpha3Provider()
    {
        $currencies = $this->getCurrencies();

        return array_reduce(
            $currencies,
            function (array $carry, array $currency) {
                $carry[] = array($currency['alpha3'], $currency);
                return $carry;
            },
            array()
        );
    }

    /**
     * @return array
     */
    public function invalidNumericProvider()
    {
        return array(array('00'), array('0000'), array('ZZ'), array('ZZZZ'));
    }

    /**
     * @return array
     */
    public function numericProvider()
    {
        $currencies = $this->getCurrencies();

        return array_reduce(
            $currencies,
            function (array $carry, array $currency) {
                $carry[] = array($currency['numeric'], $currency);
                return $carry;
            },
            array()
        );
    }

    /**
     * @return array
     */
    private function getCurrencies()
    {
        $reflected = new \ReflectionClass('Alcohol\ISO4217');
        $currencies = $reflected->getProperty('currencies');
        $currencies->setAccessible(true);

        return $currencies->getValue(new ISO4217);
    }
}
