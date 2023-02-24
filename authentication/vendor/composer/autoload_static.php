<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3ba304a6c2c7bc6f757d1c9e7a344aac
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'ZxcvbnPhp\\' => 10,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
        ),
        'E' => 
        array (
            'Erwan\\Authentication\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ZxcvbnPhp\\' => 
        array (
            0 => __DIR__ . '/..' . '/bjeavons/zxcvbn-php/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Erwan\\Authentication\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3ba304a6c2c7bc6f757d1c9e7a344aac::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3ba304a6c2c7bc6f757d1c9e7a344aac::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3ba304a6c2c7bc6f757d1c9e7a344aac::$classMap;

        }, null, ClassLoader::class);
    }
}
