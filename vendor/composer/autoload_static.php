<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb70a7bc98313474e688b616b65c00498
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'mvc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'mvc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb70a7bc98313474e688b616b65c00498::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb70a7bc98313474e688b616b65c00498::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}