<?php

namespace FakerPerson;

class Factory
{

    protected static $defaultProviders = [
        'Address',
        'Company',
        'Identity',
        'Bank',
        'Name',
        'PhoneNumber'
    ];
    /**
     * Create a new generator
     *
     * @param string $locale
     * @return Generator
     */
    public static function create()
    {
        $generator = new Generator();

        foreach (static::$defaultProviders as $provider) {
            $providerClassName = self::getProviderClassname($provider);
            $generator->addProvider(new $providerClassName($generator));
        }
        return $generator;
    }

    /**
     * @param string $provider
     * @param string $locale
     * @return string
     */
    protected static function getProviderClassname($provider)
    {
        $providerClass = 'FakerPerson\\' . sprintf('Provider\%s', $provider);
        if (class_exists($providerClass, true)) {
            return $providerClass;
        }
        throw new \InvalidArgumentException(sprintf('Unable to find provider "%s"', $provider));
    }
}
