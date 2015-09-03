<?php

namespace Alcohol;

trait HasCurrencies
{
    /**
     * @var array
     */
    private $iso4217;

    /**
     * @param mixed $code
     * @return array
     */
    private function currency($code = null)
    {
        // Store the object to prevent unnecessary instantiation
        if (is_null($this->iso4217)) {
            $this->iso4217 = new ISO4217;
        }

        if (is_null($code)) {
            $this->iso4217->getAll();
        }

        return $this->iso4217->getByCode($code);
    }
}
