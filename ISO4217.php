<?php

/*
 * (c) Rob Bast <rob.bast@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Alcohol;

/**
 * A library providing ISO 4217 data.
 */
class ISO4217
{
    /**
     * @api
     *
     * @param string $code
     *
     * @throws \OutOfBoundsException
     *
     * @return array
     */
    public function getByCode($code)
    {
        foreach ($this->getCurrencies() as $currency) {
            if (0 === strcasecmp($code, $currency['alpha3']) ||
                0 === strcasecmp($code, $currency['numeric'])) {
                return $currency;
            }
        }

        throw new \OutOfBoundsException('ISO 4217 does not contain: '.$code);
    }

    /**
     * @api
     *
     * @uses ::getByCode()
     *
     * @param string $alpha3
     *
     * @throws \DomainException
     *
     * @return array
     */
    public function getByAlpha3($alpha3)
    {
        if (!preg_match('/^[a-zA-Z]{3}$/', $alpha3)) {
            throw new \DomainException('Not a valid alpha3: '.$alpha3);
        }

        return $this->getByCode($alpha3);
    }

    /**
     * @api
     *
     * @uses ::getByCode()
     *
     * @param string $numeric
     *
     * @throws \DomainException
     *
     * @return array
     */
    public function getByNumeric($numeric)
    {
        if (!preg_match('/^[0-9]{3}$/', $numeric)) {
            throw new \DomainException('Not a valid numeric: '.$numeric);
        }

        return $this->getByCode($numeric);
    }

    /**
     * @api
     *
     * @uses ::$currencies
     *
     * @return array
     */
    public function getAll()
    {
        return $this->getCurrencies();
    }

    /**
     * @return mixed
     */
    protected function getCurrencies()
    {
        $currencies = require __DIR__ . '/currency_codes.php';

        return $currencies;
    }
}
