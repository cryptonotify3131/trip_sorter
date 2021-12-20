<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3e2dad3c932ac8d5c853394e7346fd8e
{
    public static $classMap = array (
        'Cards' => __DIR__ . '/../..' . '/app/models/Cards.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'TripSorter' => __DIR__ . '/../..' . '/app/services/TripSorter.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit3e2dad3c932ac8d5c853394e7346fd8e::$classMap;

        }, null, ClassLoader::class);
    }
}