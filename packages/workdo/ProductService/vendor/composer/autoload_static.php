<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit28e2185f00bc6d064dbf33474ed88153
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Workdo\\ProductService\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Workdo\\ProductService\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit28e2185f00bc6d064dbf33474ed88153::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit28e2185f00bc6d064dbf33474ed88153::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit28e2185f00bc6d064dbf33474ed88153::$classMap;

        }, null, ClassLoader::class);
    }
}