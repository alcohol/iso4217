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
     * @testdox Calling getByAlpha3 with an invalid alpha3 throws a InvalidArgumentException.
     * @param string $alpha3
     * @dataProvider invalidAlpha3Provider
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp /^Not a valid alpha3: .*$/
     */
    public function testFindByAlpha3Invalid($alpha3)
    {
        ISO4217::findByAlpha3($alpha3);
    }

    /**
     * @testdox Calling getByAlpha3 with an unknown alpha3 throws a RuntimeException.
     * @expectedException \RuntimeException
     * @expectedExceptionMessage ISO 4217 does not contain: ZZZ
     */
    public function testFindByAlpha3Unknown()
    {
        ISO4217::findByAlpha3('ZZZ');
    }

    /**
     * @testdox Calling getByAlpha3 with a known alpha3 returns an associative array with the data.
     * @dataProvider alpha3Provider
     * @param string $alpha3
     * @param array $expected
     */
    public function testFindByAlpha3($alpha3, array $expected)
    {
        $currency = ISO4217::findByAlpha3($alpha3);

        $this->assertEquals($expected['name'], $currency->getName());
        $this->assertEquals($expected['alpha3'], $currency->getAlpha3());
        $this->assertEquals($expected['numeric'], $currency->getNumeric());
        $this->assertEquals($expected['exp'], $currency->getExp());
        $this->assertEquals($expected['country'], $currency->getCountry());
    }

    /**
     * @testdox Calling getByNumeric with an invalid numeric throws a InvalidArgumentException.
     * @param string $numeric
     * @dataProvider invalidNumericProvider
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp /^Not a valid numeric: .*$/
     */
    public function testFindByNumericInvalid($numeric)
    {
        ISO4217::findByNumeric($numeric);
    }

    /**
     * @testdox Calling getByNumeric with an unknown numeric throws a RuntimeException.
     * @expectedException \RuntimeException
     * @expectedExceptionMessage ISO 4217 does not contain: 000
     */
    public function testFindByNumericUnknown()
    {
        ISO4217::findByNumeric('000');
    }

    /**
     * @testdox Calling getByNumeric with a known numeric returns an associative array with the data.
     * @dataProvider numericProvider
     * @param string $numeric
     * @param array $expected
     */
    public function testFindByNumeric($numeric, array $expected)
    {
        $currency = ISO4217::findByNumeric($numeric);

        $this->assertEquals($expected['name'], $currency->getName());
        $this->assertEquals($expected['alpha3'], $currency->getAlpha3());
        $this->assertEquals($expected['numeric'], $currency->getNumeric());
        $this->assertEquals($expected['exp'], $currency->getExp());
        $this->assertEquals($expected['country'], $currency->getCountry());
    }

    /**
     * @testdox Calling findAll returns an array of ISO4217 instances.
     */
    public function testFindAll()
    {
        $currencies = ISO4217::findAll();

        $this->assertInternalType('array', $currencies);
        $this->assertCount(157, $currencies);

        $this->assertContainsOnly('Alcohol\ISO4217', $currencies);
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
        return $this->getCurrencies('alpha3');
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
        return $this->getCurrencies('numeric');
    }

    /**
     * @return array
     */
    private function getCurrencies($indexedBy)
    {
        $rp = new \ReflectionProperty('Alcohol\ISO4217', 'currencies');
        $rp->setAccessible(true);
        $currencies = $rp->getValue('Alcohol\ISO4217');
        $rp->setAccessible(false);

        return array_reduce(
            $currencies,
            function (array $carry, array $currency) use ($indexedBy) {
                $carry[] = array($currency[$indexedBy], $currency);
                return $carry;
            },
            array()
        );
    }
}
