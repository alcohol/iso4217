<?php

namespace Alcohol;

class ISO4217
{
    /**
     * @var array
     */
    protected static $currencies = array();

    /**
     * @param string $code
     * @return array
     */
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

    /**
     * @param string $alpha3
     * @return array
     * @throws \InvalidArgumentException
     */
    public static function getByAlpha3($alpha3)
    {
        if (!preg_match('/^[a-zA-Z]{3}$/', $alpha3)) {
            throw new \InvalidArgumentException('Not a valid alpha3: ' . $alpha3);
        }

        return self::getByCode($alpha3);
    }

    /**
     * @param string $numeric
     * @return array
     * @throws \RuntimeException
     */
    public static function getByNumeric($numeric)
    {
        if (!preg_match('/^[0-9]{3}$/', $numeric)) {
            throw new \InvalidArgumentException('Not a valid numeric: ' . $numeric);
        }

        $currencies = self::getAll();

        foreach ($currencies as $currency) {
            if (0 === strcasecmp($numeric, $currency['numeric'])) {
                return $currency;
            }
        }

        throw new \RuntimeException('No data found for: ' . $numeric);
    }

    /**
     * @return array
     */
    public static function getAll()
    {
        if (empty(self::$currencies)) {
            self::load();
        }

        return self::$currencies;
    }

    /**
     * @param array $currencies
     */
    public static function load(array $currencies = array())
    {
        if (empty($currencies)) {
            $currencies = self::fromDataDir();
        }

        self::$currencies = $currencies;
    }

    /**
     * @return array
     */
    final protected static function fromDataDir()
    {
        $currencies = require __DIR__ . '/../data/iso4217.php';

        return $currencies;
    }
}
