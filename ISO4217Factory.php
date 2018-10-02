<?php

namespace Alcohol;

abstract class ISO4217Factory
{
    public static function create()
    {
        return new ISO4217();
    }
}
