<?php

/*
 * (c) Rob Bast <rob.bast@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Alcohol;

use PHPUnit\Framework\TestCase;

class ISO4217Test extends TestCase
{
    /**
     * @testdox Calling getByAlpha3 with an invalid alpha3 throws a DomainException.
     *
     * @param string $alpha3
     * @dataProvider invalidAlpha3Provider
     * @expectedException \DomainException
     * @expectedExceptionMessageRegExp /^Not a valid alpha3: .*$/
     */
    public function testGetByAlpha3Invalid($alpha3)
    {
        $iso4217 = new ISO4217();
        $iso4217->getByAlpha3($alpha3);
    }

    /**
     * @testdox Calling getByAlpha3 with an unknown alpha3 throws a OutOfBoundsException.
     * @expectedException \OutOfBoundsException
     * @expectedExceptionMessage ISO 4217 does not contain: ZZZ
     */
    public function testGetByAlpha3Unknown()
    {
        $iso4217 = new ISO4217();
        $iso4217->getByAlpha3('ZZZ');
    }

    /**
     * @testdox Calling getByAlpha3 with a known alpha3 returns an associative array with the data.
     * @dataProvider alpha3Provider
     *
     * @param string $alpha3
     * @param array $expected
     */
    public function testGetByAlpha3($alpha3, array $expected)
    {
        $iso4217 = new ISO4217();
        $this->assertEquals($expected, $iso4217->getByAlpha3($alpha3));
    }

    /**
     * @testdox Calling getByNumeric with an invalid numeric throws a DomainException.
     *
     * @param string $numeric
     * @dataProvider invalidNumericProvider
     * @expectedException \DomainException
     * @expectedExceptionMessageRegExp /^Not a valid numeric: .*$/
     */
    public function testGetByNumericInvalid($numeric)
    {
        $iso4217 = new ISO4217();
        $iso4217->getByNumeric($numeric);
    }

    /**
     * @testdox Calling getByNumeric with an unknown numeric throws a OutOfBoundsException.
     * @expectedException \OutOfBoundsException
     * @expectedExceptionMessage ISO 4217 does not contain: 000
     */
    public function testGetByNumericUnknown()
    {
        $iso4217 = new ISO4217();
        $iso4217->getByNumeric('000');
    }

    /**
     * @testdox Calling getByNumeric with a known numeric returns an associative array with the data.
     * @dataProvider numericProvider
     *
     * @param string $numeric
     * @param array $expected
     */
    public function testGetByNumeric($numeric, $expected)
    {
        $iso4217 = new ISO4217();
        $this->assertEquals($expected, $iso4217->getByNumeric($numeric));
    }

    /**
     * @testdox Calling getAll returns an array with all elements.
     */
    public function testGetAll()
    {
        $iso4217 = new ISO4217();
        $this->assertInternalType('array', $iso4217->getAll());
        $this->assertCount(156, $iso4217->getAll());
    }

    /**
     * @return array
     */
    public function invalidAlpha3Provider()
    {
        return [['ZZ'], ['ZZZZ'], [12], [1234]];
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
        return [['00'], ['0000'], ['ZZ'], ['ZZZZ']];
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
        $reflected = new \ReflectionClass('Alcohol\ISO4217');
        $currencies = $reflected->getProperty('currencies');
        $currencies->setAccessible(true);
        $currencies = $currencies->getValue(new ISO4217());

        return array_reduce(
            $currencies,
            function (array $carry, array $currency) use ($indexedBy) {
                $carry[] = [$currency[$indexedBy], $currency];

                return $carry;
            },
            []
        );
    }
}
