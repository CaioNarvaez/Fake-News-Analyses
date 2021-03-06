<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6b61b6ad716312e9accff32cde5fa59e
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Functions\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Functions\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/server/Functions',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Functions\\Source' => __DIR__ . '/../..' . '/src/server/Functions/Source.php',
        'Functions\\Text' => __DIR__ . '/../..' . '/src/server/Functions/Text.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6b61b6ad716312e9accff32cde5fa59e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6b61b6ad716312e9accff32cde5fa59e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6b61b6ad716312e9accff32cde5fa59e::$classMap;

        }, null, ClassLoader::class);
    }
}
