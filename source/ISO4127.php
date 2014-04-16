<?php

namespace Alcohol;

class ISO4127
{
    protected static $currencies = null;

    public static function getByCode($code)
    {
        $currencies = self::getAll();

        foreach ($currencies as $currency) {
            if (0 === strcasecmp($code, $currency['alpha3'])) {
                return $currency;
            }
        }

        throw new \RuntimeException('No data found for: ' . $code);
    }

    public static function getByAlpha3($alpha3)
    {
        return self::getByCode($alpha3);
    }

    public static function getByNumeric($numeric)
    {
        $currencies = self::getAll();

        foreach ($currencies as $currency) {
            if (0 === strcasecmp($numeric, $currency['numeric'])) {
                return $currency;
            }
        }

        throw new \RuntimeException('No data found for: ' . $numeric);
    }

    public static function getAll()
    {
        if (is_null(self::$currencies)) {
            self::load();
        }

        return self::$currencies;
    }

    public static function load(array $currencies = array())
    {
        if (empty($countries)) {
            $currencies = self::fromDataDir();
        }

        self::$currencies = $currencies;
    }

    final protected static function fromDataDir()
    {
        $json = file_get_contents(__DIR__.'/../data/iso4127.json');

        return json_decode($json, true);
    }
}
