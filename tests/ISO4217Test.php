<?php

declare(strict_types=1);

/*
 * (c) Rob Bast <rob.bast@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Alcohol\Tests;

use Alcohol\ISO4217;
use Alcohol\ISO4217\Exception;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

/**
 * @phpstan-type Currency array{name: string, alpha3: string, numeric: string, exp: int, country: string|string[]}
 */
final class ISO4217Test extends TestCase
{
    /**
     * @dataProvider invalidAlpha3Provider
     *
     * @param class-string<\Throwable> $expectException
     */
    #[DataProvider('invalidAlpha3Provider')]
    #[TestDox('Calling getByAlpha3 with an invalid alpha3 throws a DomainException.')]
    public function testGetByAlpha3Invalid(string $alpha3, string $expectException): void
    {
        $this->expectException($expectException);

        $iso4217 = new ISO4217();
        $iso4217->getByAlpha3($alpha3);
    }

    #[TestDox('Calling getByAlpha3 with a non-string throws a TypeError.')]
    public function testGetByAlpha3NonString(): void
    {
        $this->expectException(\TypeError::class);

        $iso4217 = new ISO4217();
        $method = [$iso4217, 'getByAlpha3'];
        $method(12); // @phpstan-ignore argument.type (deliberately wrong type)
    }

    #[TestDox('Calling getByAlpha3 with an unknown alpha3 throws a OutOfBoundsException.')]
    public function testGetByAlpha3Unknown(): void
    {
        $this->expectExceptionObject(new \OutOfBoundsException('ISO 4217 does not contain: ZZZ'));

        $iso4217 = new ISO4217();
        $iso4217->getByAlpha3('ZZZ');
    }

    /**
     * @dataProvider alpha3Provider
     *
     * @param Currency $expected
     */
    #[DataProvider('alpha3Provider')]
    #[TestDox('Calling getByAlpha3 with a known alpha3 returns an associative array with the data.')]
    public function testGetByAlpha3(string $alpha3, array $expected): void
    {
        $iso4217 = new ISO4217();
        self::assertSame($expected, $iso4217->getByAlpha3($alpha3));
    }

    #[TestDox('Calling getByAlpha3 is case insensitive.')]
    public function testGetByAlpha3CaseInsensitive(): void
    {
        $iso4217 = new ISO4217();
        self::assertSame($iso4217->getByAlpha3('EUR'), $iso4217->getByAlpha3('eur'));
    }

    /**
     * @dataProvider invalidNumericProvider
     *
     * @param class-string<\Throwable> $expectException
     */
    #[DataProvider('invalidNumericProvider')]
    #[TestDox('Calling getByNumeric with an invalid numeric throws a DomainException.')]
    public function testGetByNumericInvalid(string $numeric, string $expectException): void
    {
        $this->expectException($expectException);

        $iso4217 = new ISO4217();
        $iso4217->getByNumeric($numeric);
    }

    #[TestDox('Calling getByNumeric with a non-string throws a TypeError.')]
    public function testGetByNumericNonString(): void
    {
        $this->expectException(\TypeError::class);

        $iso4217 = new ISO4217();
        $method = [$iso4217, 'getByNumeric'];
        $method(978); // @phpstan-ignore argument.type (deliberately wrong type)
    }

    #[TestDox('Calling getByNumeric with an unknown numeric throws a OutOfBoundsException.')]
    public function testGetByNumericUnknown(): void
    {
        $this->expectExceptionObject(new \OutOfBoundsException('ISO 4217 does not contain: 000'));

        $iso4217 = new ISO4217();
        $iso4217->getByNumeric('000');
    }

    /**
     * @dataProvider numericProvider
     *
     * @param Currency $expected
     */
    #[DataProvider('numericProvider')]
    #[TestDox('Calling getByNumeric with a known numeric returns an associative array with the data.')]
    public function testGetByNumeric(string $numeric, array $expected): void
    {
        $iso4217 = new ISO4217();
        self::assertSame($expected, $iso4217->getByNumeric($numeric));
    }

    /**
     * @dataProvider invalidAlpha2Provider
     */
    #[DataProvider('invalidAlpha2Provider')]
    #[TestDox('Calling getByCountry with an invalid alpha2 throws a DomainException.')]
    public function testGetByCountryInvalid(string $alpha2): void
    {
        $this->expectExceptionObject(new \DomainException('Not a valid alpha2: '.$alpha2));

        $iso4217 = new ISO4217();
        $iso4217->getByCountry($alpha2);
    }

    #[TestDox('Calling getByCountry with an unknown alpha2 throws a OutOfBoundsException.')]
    public function testGetByCountryUnknown(): void
    {
        $this->expectExceptionObject(new \OutOfBoundsException('ISO 4217 does not contain a currency for: zz'));

        $iso4217 = new ISO4217();
        $iso4217->getByCountry('zz');
    }

    #[TestDox('Calling getByCountry returns every currency whose country list contains the alpha2.')]
    public function testGetByCountry(): void
    {
        $iso4217 = new ISO4217();

        // single-country currency (country is a string)
        self::assertSame(['JPY'], self::alpha3s($iso4217->getByCountry('JP')));
        // multi-country currency (country is an array)
        self::assertSame(['EUR'], self::alpha3s($iso4217->getByCountry('NL')));
        // more than one currency for a country, in data order
        self::assertSame(['LSL', 'ZAR'], self::alpha3s($iso4217->getByCountry('LS')));
    }

    #[TestDox('Calling getByCountry is case insensitive.')]
    public function testGetByCountryCaseInsensitive(): void
    {
        $iso4217 = new ISO4217();
        self::assertSame($iso4217->getByCountry('NL'), $iso4217->getByCountry('nl'));
    }

    /**
     * @dataProvider countryCurrenciesProvider
     *
     * @param list<string> $expected
     */
    #[DataProvider('countryCurrenciesProvider')]
    #[TestDox('Calling getByCountry returns the currencies currently in use in that country.')]
    public function testGetByCountryCurrentCurrencies(string $alpha2, array $expected): void
    {
        $iso4217 = new ISO4217();
        self::assertSame($expected, self::alpha3s($iso4217->getByCountry($alpha2)));
    }

    /**
     * @dataProvider withdrawnProvider
     */
    #[DataProvider('withdrawnProvider')]
    #[TestDox('Withdrawn currencies are no longer listed.')]
    public function testWithdrawnCurrencies(string $alpha3): void
    {
        $this->expectException(\OutOfBoundsException::class);

        $iso4217 = new ISO4217();
        $iso4217->getByAlpha3($alpha3);
    }

    #[TestDox('Every country referenced in the data resolves through getByCountry.')]
    public function testGetByCountryCoversAllData(): void
    {
        $iso4217 = new ISO4217();

        foreach ($iso4217->getAll() as $currency) {
            foreach ((array) $currency['country'] as $alpha2) {
                self::assertContains($currency, $iso4217->getByCountry($alpha2));
            }
        }
    }

    /**
     * @dataProvider exceptionProvider
     *
     * @param class-string<\Throwable> $spl
     */
    #[DataProvider('exceptionProvider')]
    #[TestDox('Exceptions thrown by the library implement the Alcohol\\ISO4217\\Exception marker interface.')]
    public function testExceptionsImplementMarkerInterface(string $method, string $argument, string $spl): void
    {
        $iso4217 = new ISO4217();
        $callable = [$iso4217, $method];
        self::assertIsCallable($callable);

        try {
            $callable($argument);
        } catch (Exception $e) {
            self::assertInstanceOf($spl, $e);

            return;
        }

        self::fail('Expected an exception implementing '.Exception::class);
    }

    #[TestDox('Calling getAll returns an array with all elements.')]
    public function testGetAll(): void
    {
        $iso4217 = new ISO4217();
        self::assertCount(154, $iso4217->getAll());
    }

    #[TestDox('The class is countable.')]
    public function testCount(): void
    {
        $iso4217 = new ISO4217();
        self::assertCount(154, $iso4217);
        self::assertSame(count($iso4217->getAll()), count($iso4217));
    }

    #[TestDox('Iterating over the class yields the same records as getAll.')]
    public function testIterator(): void
    {
        $iso4217 = new ISO4217();
        self::assertSame($iso4217->getAll(), iterator_to_array($iso4217));
    }

    /**
     * @return array<array{string, class-string<\Throwable>}>
     */
    public static function invalidAlpha3Provider(): array
    {
        return [
            ['00', \DomainException::class],
            ['0000', \DomainException::class],
            ['ZZ', \DomainException::class],
            ['ZZZZ', \DomainException::class],
        ];
    }

    /**
     * @return array<array{string, Currency}>
     */
    public static function alpha3Provider(): array
    {
        return self::getCurrencies('alpha3');
    }

    /**
     * @return array<array{string, class-string<\Throwable>}>
     */
    public static function invalidNumericProvider(): array
    {
        return [
            ['00', \DomainException::class],
            ['0000', \DomainException::class],
            ['ZZ', \DomainException::class],
            ['ZZZZ', \DomainException::class],
        ];
    }

    /**
     * @return array<array{string, Currency}>
     */
    public static function numericProvider(): array
    {
        return self::getCurrencies('numeric');
    }

    /**
     * @return array<array{string}>
     */
    public static function invalidAlpha2Provider(): array
    {
        return [
            ['N'],
            ['NLD'],
            ['12'],
            [''],
        ];
    }

    /**
     * @return array<array{string, list<string>}>
     */
    public static function countryCurrenciesProvider(): array
    {
        return [
            ['AQ', ['BYN', 'NOK', 'USD']],
            ['BG', ['EUR']],
            ['BT', ['BTN', 'INR']],
            ['CU', ['CUP']],
            ['CW', ['XCG']],
            ['HR', ['EUR']],
            ['HT', ['HTG', 'USD']],
            ['LV', ['EUR']],
            ['PA', ['PAB', 'USD']],
            ['SL', ['SLE']],
            ['SX', ['XCG']],
            ['VE', ['VED', 'VES']],
            ['XK', ['EUR']],
        ];
    }

    /**
     * @return array<array{string}>
     */
    public static function withdrawnProvider(): array
    {
        return [['ANG'], ['BGN'], ['CUC'], ['HRK'], ['LVL'], ['SLL']];
    }

    /**
     * @return array<string, array{string, string, class-string<\Throwable>}>
     */
    public static function exceptionProvider(): array
    {
        return [
            'getByCode unknown' => ['getByCode', 'ZZZ', \OutOfBoundsException::class],
            'getByAlpha3 invalid' => ['getByAlpha3', 'ZZ', \DomainException::class],
            'getByAlpha3 unknown' => ['getByAlpha3', 'ZZZ', \OutOfBoundsException::class],
            'getByNumeric invalid' => ['getByNumeric', '00', \DomainException::class],
            'getByNumeric unknown' => ['getByNumeric', '000', \OutOfBoundsException::class],
            'getByCountry invalid' => ['getByCountry', 'Z', \DomainException::class],
            'getByCountry unknown' => ['getByCountry', 'ZZ', \OutOfBoundsException::class],
        ];
    }

    /**
     * @param list<Currency> $currencies
     *
     * @return list<string>
     */
    private static function alpha3s(array $currencies): array
    {
        return array_column($currencies, 'alpha3');
    }

    /**
     * @param 'alpha3'|'numeric' $indexedBy
     *
     * @return array<array{string, Currency}>
     */
    private static function getCurrencies(string $indexedBy): array
    {
        $carry = [];

        foreach ((new ISO4217())->getAll() as $currency) {
            $carry[] = [$currency[$indexedBy], $currency];
        }

        return $carry;
    }
}
