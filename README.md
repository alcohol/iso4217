# alcohol/iso4217

A PHP library providing ISO 4217 data.

> [!NOTE]
> I do my best to keep the data up to date, but if you find any errors or omissions, please [open an issue](https://github.com/alcohol/iso4217/issues/new).

[![Continuous Integration](https://github.com/alcohol/iso4217/actions/workflows/ci.yaml/badge.svg?branch=main)](https://github.com/alcohol/iso4217/actions/workflows/ci.yaml)
[![codecov](https://codecov.io/gh/alcohol/iso4217/branch/main/graph/badge.svg)](https://codecov.io/gh/alcohol/iso4217)
[![License](https://img.shields.io/packagist/l/alcohol/iso4217.svg?style=flat-square)](https://packagist.org/packages/alcohol/iso4217)

## What is ISO 4217

> ISO 4217 is a standard published by the International Organization for Standardization, which delineates currency designators, country codes (alpha and numeric), and references to minor units in three tables.
>
> *-- [Wikipedia](https://en.wikipedia.org/wiki/ISO_4217)*

## Installing

``` sh
$ composer require alcohol/iso4217
```

## Using

Code:

``` php
<?php

$iso4217 = new Alcohol\ISO4217();

$iso4217->getByAlpha3('EUR');
// or
$iso4217->getByNumeric('978');

// also
$iso4217->getAll();
```

Result:

```
Array
(
    [name] => Euro
    [alpha3] => EUR
    [numeric] => 978
    [exp] => 2
    [country] => Array
        (
            [0] => AD
            [1] => AT
            ...
            [36] => YT
            [37] => ZW
        )
)
```

All currencies used in a country (by ISO 3166-1 alpha2 code):

``` php
<?php

$iso4217->getByCountry('LS');
// [['name' => 'Lesotho Loti', 'alpha3' => 'LSL', ...], ['name' => 'South African Rand', 'alpha3' => 'ZAR', ...]]
```

The class is also `Countable` and iterable:

``` php
<?php

count($iso4217); // number of currencies

foreach ($iso4217 as $currency) {
    // ...
}
```

Note that `country` is a string when a currency is used in a single country, and an
array of strings when it is used in several.

### Exceptions

* `Alcohol\ISO4217\Exception\DomainException` (extends `\DomainException`) is thrown when a code
  is not well-formed, e.g. `getByAlpha3('EU')`.
* `Alcohol\ISO4217\Exception\OutOfBoundsException` (extends `\OutOfBoundsException`) is thrown when
  a well-formed code is not in the data, e.g. `getByAlpha3('ZZZ')`.

Both implement `Alcohol\ISO4217\Exception`, so you can catch every exception
thrown by this library with a single `catch` block.

## Excluded

The following codes have been intentionally left out:

* BOV Bolivian Mvdol (funds code)
* CHE WIR Euro (complementary currency)
* CHW WIR Franc (complementary currency)
* CLF Unidad de Fomento (funds code)
* COU Unidad de Valor Real (UVR) (funds code)
* MXV Mexican Unidad de Inversion (UDI) (funds code)
* USN United States dollar (next day) (funds code)
* UYI Uruguay Peso en Unidades Indexadas (URUIURUI) (funds code)
* UYW Unidad Previsional (tracks nominal wage index)
* XAD Arab Accounting Dinar (Arab Monetary Fund unit of account)
* XAG Silver (one troy ounce)
* XAU Gold (one troy ounce)
* XBA European Composite Unit (EURCO) (bond market unit)
* XBB European Monetary Unit (E.M.U.-6) (bond market unit)
* XBC European Unit of Account 9 (E.U.A.-9) (bond market unit)
* XBD European Unit of Account 17 (E.U.A.-17) (bond market unit)
* XDR Special drawing rights
* XPD Palladium (one troy ounce)
* XPT Platinum (one troy ounce)
* XSU Unified System for Regional Compensation (SUCRE)
* XTS Code reserved for testing purposes
* XUA ADB Unit of Account (African Development Bank)
* XXX No currency

Also left out, although ISO 4217 still lists it:

* SVC El Salvador Colon (El Salvador has used the US Dollar since 2001)

Currencies that have been withdrawn from ISO 4217 are removed:

* ANG Netherlands Antillean Guilder (replaced by XCG, 2025)
* BGN Bulgarian Lev (replaced by EUR, 2026)
* CUC Cuban Convertible Peso (2021)
* HRK Croatian Kuna (replaced by EUR, 2023)
* LTL Lithuanian Litas (replaced by EUR, 2015)
* LVL Latvian Lats (replaced by EUR, 2014)
* SLL Sierra Leonean Leone (replaced by SLE, 2023)
* VEF Venezuelan Bolívar Fuerte (replaced by VES)
* ZWD/ZWN/ZWR/ZWL Zimbabwean dollar(s) (replaced by ZWG)

## Contributing

Feel free to submit a pull request or create an issue.

## License

alcohol/iso4217 is licensed under the MIT license.

## Source(s)

* "[ISO 4217](https://en.wikipedia.org/wiki/ISO_4217)" by [Wikipedia](https://www.wikipedia.org) licensed under [CC BY-SA 3.0 Unported License](https://en.wikipedia.org/wiki/Wikipedia:Text_of_Creative_Commons_Attribution-ShareAlike_3.0_Unported_License)
