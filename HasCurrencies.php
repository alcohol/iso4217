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
    private function currency($code)
    {
        // Store the object to prevent unnecessary instantiation
        if (is_null($this->iso4217)) {
            $this->iso4217 = new ISO4217;
        }

        return $this->iso4217->getByCode($code);
    }
}
