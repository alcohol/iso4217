[![Build Status](https://travis-ci.org/alcohol/iso4217.png?branch=master)](https://travis-ci.org/alcohol/iso4217)

# Alcohol\ISO4217

Example:

```php
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
