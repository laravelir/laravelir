<?php

namespace App\Traits;

use ReflectionClass;

trait GetConstantsEnum
{
    public static function getConstants()
    {
        $reflectionClass = new ReflectionClass(static::class);
        return $reflectionClass->getConstants();
    }

    public static function getConstantValues()
    {
        $reflectionClass = new ReflectionClass(static::class);
        return array_values($reflectionClass->getConstants());
    }
}
