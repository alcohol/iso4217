# Alcohol\ISO4217

A library providing ISO 4217 data.

[![Build Status](https://travis-ci.org/alcohol/iso4217.png?branch=master)](https://travis-ci.org/alcohol/iso4217)

## Usage

Code:

``` php
use Alcohol\ISO4217;

ISO4217::getByAlpha3('EUR');
 // or
ISO4217::getByNumeric('978');
```

Result:

```
Array
(
    [alpha3] => EUR
    [numeric] => 978
    [exp] => 2
    [name] => Euro
)
```

## Installation

Either install it directly from command line using composer:

``` sh
$ composer require alcohol/iso4217
```

or include it as a dependency in your composer.json:

``` javascript
{
    "require": {
        "alcohol/iso4217": "~1.0"
    }
}
```

## Contributing

Feel free to submit a pull request or create an issue ticket.