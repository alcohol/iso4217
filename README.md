# Payum\ISO4217

A PHP library providing ISO 4217 data. This is a **fork** of [alcohol/iso4217](https://github.com/alcohol/iso4217) and here's why I [did the fork](https://github.com/alcohol/iso4217/pull/1).

[![Build Status](https://img.shields.io/travis/Payum/iso4217/master.svg?style=flat-square)](https://travis-ci.org/payum/iso4217)
[![License](https://img.shields.io/packagist/l/Payum/iso4217.svg?style=flat-square)](https://packagist.org/packages/payum/iso4217)

## What is ISO 4217

> ISO 4217 is a standard published by the International Organization for Standardization, which delineates currency designators, country codes (alpha and numeric), and references to minor units in three tables.
>
> *-- [Wikipedia](http://en.wikipedia.org/wiki/ISO_4217)*

## Installing

Either install directly from command line using composer:

``` sh
$ composer require "payum/iso4217:~1.0"
```

## Using

Code:

``` php
<?php

$iso4217 = new \Payum\ISO4217\ISO4217; 

$euro = $iso4217->findByAlpha3('EUR');

// or

$euro = $iso4217->findByNumeric('978');

$euro->getName();    // Euro
$euro->getAlpha3();  // EUR
$euro->getNumeric(); // 978
$euro->getExp();     // 2
$euro->getCountry(); // ['AD', 'AT' ... 'YT', 'ZW']


// same instance
$iso4217->findByAlpha3('EUR') === $iso4217->findByAlpha3('EUR'); // true
$iso4217->findByAlpha3('EUR') === $iso4217->findByAlpha3('USD'); // false
```



## Excluded

The following codes have been intentionally left out:

* BOV Bolivian Mvdol (funds code)
* CHE WIR Euro (complementary currency)
* CHW WIR Franc (complementary currency)
* CLF Unidad de Fomento (funds code)
* CNH Chinese yuan when traded in Hong Kong
* COU Unidad de Valor Real (UVR) (funds code)
* MXV Mexican Unidad de Inversion (UDI) (funds code)
* USN United States dollar (next day) (funds code)
* USS United States dollar (same day) (funds code)
* UYI Uruguay Peso en Unidades Indexadas (URUIURUI) (funds code)
* XAG Silver (one troy ounce)
* XAU Gold (one troy ounce)
* XBA European Composite Unit (EURCO) (bond market unit)
* XBB European Monetary Unit (E.M.U.-6) (bond market unit)
* XBC European Unit of Account 9 (E.U.A.-9) (bond market unit)
* XBD European Unit of Account 17 (E.U.A.-17) (bond market unit)
* XDR Special drawing rights
* XFU UIC franc (special settlement currency)
* XPD Palladium (one troy ounce)
* XPT Platinum (one troy ounce)
* XSU Unified System for Regional Compensation (SUCRE)
* XTS Code reserved for testing purposes
* XUA ADB Unit of Account (African Development Bank)
* XXX No currency
* ZWD Zimbabwe dollar

## Contributing

Feel free to submit a pull request or create an issue.

## License

Payum\ISO4217 is licensed under the MIT license.

## Source(s)

* "[ISO 4217](http://en.wikipedia.org/wiki/ISO_4217)" by [Wikipedia](http://www.wikipedia.org) licensed under [CC BY-SA 3.0 Unported License](http://en.wikipedia.org/wiki/Wikipedia:Text_of_Creative_Commons_Attribution-ShareAlike_3.0_Unported_License)

