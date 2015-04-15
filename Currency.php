<?php
namespace Payum\ISO4217;

class Currency
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $alpha3;

    /**
     * @var int
     */
    protected $numeric;

    /**
     * @var int
     */
    protected $exp;

    /**
     * @var string|string[]
     */
    protected $country;

    /**
     * @param string $name
     * @param string $alpha3
     * @param int $numeric
     * @param int $exp
     * @param string|string[] $country
     */
    public function __construct($name, $alpha3, $numeric, $exp, $country)
    {
        $this->name = $name;
        $this->alpha3 = $alpha3;
        $this->numeric = $numeric;
        $this->exp = $exp;
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAlpha3()
    {
        return $this->alpha3;
    }

    /**
     * @return int
     */
    public function getNumeric()
    {
        return $this->numeric;
    }

    /**
     * @return int
     */
    public function getExp()
    {
        return $this->exp;
    }

    /**
     * @return string|\string[]
     */
    public function getCountry()
    {
        return $this->country;
    }
}