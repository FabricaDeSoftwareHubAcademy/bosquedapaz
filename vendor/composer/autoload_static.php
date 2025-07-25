<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit38572b14b55e486e2d98f07e8d4827ae
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'app\\Models\\Database' => __DIR__ . '/../..' . '/app/Models/Database.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit38572b14b55e486e2d98f07e8d4827ae::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit38572b14b55e486e2d98f07e8d4827ae::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit38572b14b55e486e2d98f07e8d4827ae::$classMap;

        }, null, ClassLoader::class);
    }
}
