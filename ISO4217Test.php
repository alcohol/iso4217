<?php

declare(strict_types=1);

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
     * @param string|int $alpha3
     * @dataProvider invalidAlpha3Provider
     */
    public function testGetByAlpha3Invalid($alpha3): void
    {
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessageMatches('/^Not a valid alpha3: .*$/');

        $iso4217 = new ISO4217();
        $iso4217->getByAlpha3($alpha3);
    }

    /**
     * @testdox Calling getByAlpha3 with an unknown alpha3 throws a OutOfBoundsException.
     */
    public function testGetByAlpha3Unknown(): void
    {
        $this->expectException(\OutOfBoundsException::class);
        $this->expectExceptionMessage('ISO 4217 does not contain: ZZZ');

        $iso4217 = new ISO4217();
        $iso4217->getByAlpha3('ZZZ');
    }

    /**
     * @testdox Calling getByAlpha3 with a known alpha3 returns an associative array with the data.
     * @dataProvider alpha3Provider
     */
    public function testGetByAlpha3(string $alpha3, array $expected): void
    {
        $iso4217 = new ISO4217();
        $this->assertEquals($expected, $iso4217->getByAlpha3($alpha3));
    }

    /**
     * @testdox Calling getByNumeric with an invalid numeric throws a DomainException.
     *
     * @dataProvider invalidNumericProvider
     */
    public function testGetByNumericInvalid(string $numeric): void
    {
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessageMatches('/^Not a valid numeric: .*$/');

        $iso4217 = new ISO4217();
        $iso4217->getByNumeric($numeric);
    }

    /**
     * @testdox Calling getByNumeric with an unknown numeric throws a OutOfBoundsException.
     */
    public function testGetByNumericUnknown(): void
    {
        $this->expectException(\OutOfBoundsException::class);
        $this->expectExceptionMessage('ISO 4217 does not contain: 000');

        $iso4217 = new ISO4217();
        $iso4217->getByNumeric('000');
    }

    /**
     * @testdox Calling getByNumeric with a known numeric returns an associative array with the data.
     * @dataProvider numericProvider
     */
    public function testGetByNumeric(string $numeric, array $expected): void
    {
        $iso4217 = new ISO4217();
        $this->assertEquals($expected, $iso4217->getByNumeric($numeric));
    }

    /**
     * @testdox Calling getAll returns an array with all elements.
     */
    public function testGetAll(): void
    {
        $iso4217 = new ISO4217();
        $this->assertIsArray($iso4217->getAll());
        $this->assertCount(156, $iso4217->getAll());
    }

    public function invalidAlpha3Provider(): array
    {
        return [['ZZ'], ['ZZZZ'], [12], [1234]];
    }

    public function alpha3Provider(): array
    {
        return $this->getCurrencies('alpha3');
    }

    public function invalidNumericProvider(): array
    {
        return [['00'], ['0000'], ['ZZ'], ['ZZZZ']];
    }

    public function numericProvider(): array
    {
        return $this->getCurrencies('numeric');
    }

    private function getCurrencies(string $indexedBy): array
    {
        $reflected = new \ReflectionClass('Alcohol\ISO4217');
        $currencies = $reflected->getProperty('currencies');
        $currencies->setAccessible(true);
        $currencies = $currencies->getValue(new ISO4217());

        return array_reduce(
            $currencies,
            static function (array $carry, array $currency) use ($indexedBy) {
                $carry[] = [$currency[$indexedBy], $currency];

                return $carry;
            },
            []
        );
    }
}
