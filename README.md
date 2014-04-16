[![Build Status](https://travis-ci.org/alcohol/iso4127.png?branch=master)](https://travis-ci.org/alcohol/iso4127)

# Alcohol\ISO4127

Example:

```php
use Alcohol\ISO4127;

ISO4127::getByAlpha3('EUR');
 // or
ISO4127::getByNumeric('978');
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
