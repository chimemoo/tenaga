<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit34dcd73c6e1369acc7634f3784961012
{
    public static $files = array (
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Whoops\\' => 7,
        ),
        'T' => 
        array (
            'Tenaga\\Handlers\\' => 16,
            'Tenaga\\' => 7,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'H' => 
        array (
            'Http\\' => 5,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
        'A' => 
        array (
            'Auryn\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Whoops\\' => 
        array (
            0 => __DIR__ . '/..' . '/filp/whoops/src/Whoops',
        ),
        'Tenaga\\Handlers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/Handlers',
        ),
        'Tenaga\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Http\\' => 
        array (
            0 => __DIR__ . '/..' . '/patricklouys/http/src',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
        'Auryn\\' => 
        array (
            0 => __DIR__ . '/..' . '/rdlowrey/auryn/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit34dcd73c6e1369acc7634f3784961012::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit34dcd73c6e1369acc7634f3784961012::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
